<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Invoice;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\MovementsBalancePending;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\QvaPayController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MovementsBalanceController;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ViewInvoiceLivewire extends Component
{
    use LivewireAlert;
    public $invoice;

    public $setting;

    public $viewManual = false;

    public $paymentImage;

    public $viewStripe = false;

    protected $listeners = ['paymenetSucceful' => 'paymentCharge'];

    use WithFileUploads;

    public function paymentCharge($id)
    {
        try {
            \Stripe\Stripe::setApiKey(Setting::first()->stripe_app_secret);

            $token = $id;

            $charge = \Stripe\Charge::create(
                [
                    'amount' => 2000,
                    'currency' => 'usd',
                    'source' => $token
                ]
            );
            $this->proccesPayment('stripe');
            $this->sendAlert('success', 'Pago completado correctamente', 'top-end');
        } catch (\Throwable $th) {
            //return dd($th);
            $this->sendAlert('error', 'Ocurrió un error', 'top-end');
        }
    }

    public function render()
    {
        return view('livewire.view-invoice-livewire');
    }

    public function mount($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $this->invoice = $invoice;
        $this->setting = Setting::first();
    }

    public function deletePaymenImage()
    {
        $this->invoice->payment_image = null;
        $this->invoice->update();
    }

    public function payWithQvaPay()
    {
        $result = QvaPayController::payWithQvaPay('service', 'order', $this->invoice->order_id, $this->invoice->value);

        if ($result == 500) {
            $this->sendAlert('error', 'Ocurrió un error con QvaPay', 'top-end');

            return;
        }

        return redirect()->away($result);
    }

    public function payWithManual()
    {
        $this->viewManual = ! $this->viewManual;
    }

    public function payWithStripe()
    {
        $this->viewStripe = ! $this->viewStripe;
    }

    public function proccesPayment($method = null)
    {
        InvoiceController::payment($this->invoice->id, $method);

        return redirect()->route('view_invoice', $this->invoice->id);
    }

    public function payWithEnzona()
    {
        InvoiceController::paywithEnzona($this->invoice->id);
    }

    public function updatedPaymentImage()
    {
        DB::beginTransaction();
        if ($this->paymentImage) {
            $this->invoice->payment_image = $this->uploadImage($this->paymentImage, 'payment'.$this->invoice->id.'.webp');
            $this->invoice->update();
            MovementsBalanceController::new_movement_pending('invoice', 'earning', $this->invoice->id, $this->invoice->value, 'manual', 'Pago manual de la factura con ID '.$this->invoice->id);
            $this->sendAlert('success', 'Comprobante enviado', 'top-end');
        }
        DB::commit();
    }

    public function removePaymentImage()
    {
        DB::beginTransaction();
        $this->invoice->payment_image = null;
        $this->invoice->update();
        $movement = MovementsBalancePending::where('refer', 'invoice')->where('refer_id', $this->invoice->id)->first();
        if ($movement) {
            $movement->delete();
        }
        DB::commit();
    }

    public static function uploadImage($path, $avatarName)
    {
        $image = $path;

        $img = Image::make($image->getRealPath())->encode('webp', 50)->orientate();
        $imgReal = Image::make($image->getRealPath())->encode('jpg', 100)->orientate();
        $imgReal->stream();
        $img->stream(); // <-- Key point
        Storage::disk('public')->put('/medias'.'/'.$avatarName, $img, 'public');
        $path = '/medias/'.$avatarName;

        return $path;
    }

    public function sendAlert($tipo, $texto, $posicion)
    {
        $this->alert($tipo, $texto, [
            'position' =>  $posicion,
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}
