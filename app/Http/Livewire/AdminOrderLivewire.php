<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrderLivewire extends Component
{
    public function render()
    {
        return view('livewire.admin-order-livewire', [
            'orders' => Order::paginate(20)
        ]);
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function completeOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'complete';
        $order->update();
    }
}
