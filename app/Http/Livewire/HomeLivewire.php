<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeLivewire extends Component
{
    public $impresions, $users,$orders,$invoices;

    public function render()
    {
        return view('livewire.home-livewire');
    }

    public function mount()
    {
        //Admin
        $this->impresions = Stat::count();
        $this->users = User::count();

        if(Auth::user()->admin || Auth::user()->staff){
            $this->orders=Order::count();
            $this->invoices=Invoice::count();
        }else{
            $this->orders=Order::where('user_id',Auth::id())->count();
            $this->invoices=Invoice::where('user_id',Auth::id())->count();
        }
    }
}
