<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InvoicesLivewire extends Component
{
    public $status = 'pending';

    public function render()
    {
        if (Auth::user()->staff || Auth::user()->admin) {
            return view('livewire.invoices-livewire',
                [
                    'invoices'=>Invoice::orderBy('created_at', 'desc')->where('status', $this->status)->paginate(20),
                    'currency'=>Setting::first()->currency
                ]);
        } else {
            return view('livewire.invoices-livewire',
                [
                    'invoices'=>Invoice::where('user_id', Auth::id())->where('status', $this->status)->orderBy('created_at', 'desc')->paginate(20),
                    'currency'=>Setting::first()->currency
                ]);
        }
    }
}
