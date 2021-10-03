<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyServicesLivewire extends Component
{
    public $serviceToBuy;
    //Buy a service
    public $clientName,$clientEmail,$clientPhone;

    public function render()
    {
        return view('livewire.buy-services-livewire',[
            'services' => Service::with('features')->where('status','active')->get()
        ]);
    }

    public function mount(){
        if(Auth::check()){
            $this->clientName=Auth::user()->name;
            $this->clientEmail=Auth::user()->email;
            $this->clientPhone=Auth::user()->phone;
        }
    }

    public function SelectBuyService($id){
        $this->serviceToBuy=Service::findOrFail($id);
    }

    public function buyService(){
        $this->validate([
            'clientName' => 'required',
            'clientEmail' => 'required|email',
            'clientPhone' => 'required'
        ]);

        OrderController::newOrder('service',$this->serviceToBuy->id,Auth::id(),$this->clientName,$this->clientEmail,$this->clientPhone);

    }
}
