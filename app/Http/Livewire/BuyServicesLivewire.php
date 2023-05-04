<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BuyServicesLivewire extends Component
{
    use LivewireAlert;
    public $serviceToBuy;

    //Buy a service
    public $clientName;

    public $clientEmail;

    public $clientPhone;

    public function render()
    {
        return view('livewire.buy-services-livewire', [
            'services' => Service::with('features')->where('status', 'active')->get()
        ]);
    }

    public function mount()
    {
        if (Auth::check()) {
            $this->clientName = Auth::user()->name;
            $this->clientEmail = Auth::user()->email;
            $this->clientPhone = Auth::user()->phone;
        }
    }

    public function SelectBuyService($id)
    {
        $this->serviceToBuy = Service::findOrFail($id);
    }

    public function buyService()
    {
        $this->validate([
            'clientName' => 'required',
            'clientEmail' => 'required|email',
            'clientPhone' => 'required'
        ]);

        OrderController::newOrder('service', $this->serviceToBuy->id, Auth::id(), $this->clientName, $this->clientEmail, $this->clientPhone);
    }
}
