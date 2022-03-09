<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function newOrder($model, $modelId, $userId, $userName, $userEmail, $userPhone)
    {
        $order = new Order();
        $order->model = $model;
        if ($model == 'service') {
            $service = Service::find($modelId);
            $order->service_id = $modelId;
            $order->name = $service->name;
            $order->price = $service->price;
        }
        if ($userId) {
            $order->user_id = $userId;
        }
        $order->client_name = $userName;
        $order->client_email = $userEmail;
        $order->client_phone = $userPhone;
        $order->save();

        InvoiceController::newInvoice($userId, $order->price, 'pending', __('messages.invoice_service').$order->name, $order->id);
    }

    public static function orderPaid($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'paid';
        $order->update();
        NotificaController::NotificaAdmin('Order paid', 'The order with id: '.$order->id.'was paid');
        NotificaController::Notifica($order->user_id, 'Order paid', 'The order with id: '.$order->id.'was paid');
    }
}
