<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Campain;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\EnzonaController;
use Cedipad\Payment\Facades\EnZona;
//use Cedipad\Payment\EnZona as PaymentEnZona;
use App\Models\MovementsBalancePending;

class InvoiceController extends Controller
{
    public static function newInvoice($user_id, $value, $status, $details, $orderID)
    {
        try {
            DB::beginTransaction();
            $invoice = new Invoice();
            $invoice->invoice_id = 'F-'.\random_int(1000000000, 9999999999);
            $invoice->invoice_url = config('app.url').'/invoices/'.$invoice->invoice_id;
            $invoice->order_id = $orderID;
            $invoice->user_id = $user_id;
            $invoice->value = $value;
            $due = now()->addWeek(1);
            $invoice->due_in = $due;
            $invoice->status = $status;
            $invoice->details = $details;
            $invoice->save();
            DB::commit();
            NotificaController::NotificaAdmin(__('messages.new_invoice'), __('messages.invoice_created'));

            return redirect()->away('/invoices/'.$invoice->id);
        } catch (\Throwable $e) {
            // return response()->json(['message' => $e->getMessage()]);
            // DB::rollback();
            throw $e;
        }
    }

    public static function payment($invoiceID, $method = 'manual')
    {
        DB::beginTransaction();
        $invoice = Invoice::findOrFail($invoiceID);
        $invoice->status = 'paid';
        $invoice->paid_in = Carbon::parse(now());
        $invoice->update();

        //Eliminamos el movimiento pendiente
        //Delete movement pending
        $movement = MovementsBalancePending::where('refer', 'invoice')->where('refer_id', $invoice->id)->first();
        if ($movement) {
            $movement->delete();
        }
        //Registramos el movimiento
        //Register the movement
        MovementsBalanceController::new_movement('user', 'expence', $invoice->user_id, 'Pay of the order '.$invoice->order_id, $invoice->value, 'Si');
        //Registramos el infreso para la paltaforma
        //Register the movement to platfor
        EarningsController::new_earning('order', $invoice->order_id, 1, $method, $invoice->value, 'complete', 'Pay of the order '.$invoice->order_id);
        //Activamos la orden
        if ($invoice->order_id) {
            OrderController::orderPaid($invoice->order_id);
        }

        DB::commit();
        NotificaController::NotificaAdmin('Invoice Paid', 'Already was aid a invoice');
    }

    public static function paywithEnzona($invoiceID)
    {
        $data = [
            'merchant_uuid' => 'string',
            'merchant_op_id' => 123456789123,
            'amount' => [
                'total' => 0.05,
                'details' => [
                    'shipping' => 0.01,
                    'discount' => 0.01,
                    'tax' => 0.01,
                    'tip' => 0.01
                ]
            ],
            'description' => 'the test description',
            'return_url' => 'https://mymerchant.cu/return',
            'currency' => 'CUP',
            'items' => [
                'quantity' => 1,
                'price' => 0.03,
                'name' => 'string',
                'description' => 'string',
                'tax' => 0.01
            ],
            'invoice_number' => 1212,
            'cancel_url' => 'https://mymerchant.cu/cancel',
            'buyer_identity_code' => 'string',
            'terminal_id' => 12121,
        ];
        $result = EnZona::createPayment($data);

        return dd($result);
    }
}
