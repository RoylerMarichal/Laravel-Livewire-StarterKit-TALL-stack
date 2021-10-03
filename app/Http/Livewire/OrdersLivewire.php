<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersLivewire extends Component
{
    public function render()
    {
        return view('livewire.orders-livewire',[
            'orders' => Order::where('user_id',Auth::id())->paginate(20)
        ]);
    }

    public function deleteOrder($id){
        $order=Order::findOrFail($id);
        $order->delete();
    }
}
