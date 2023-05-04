<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CentralNotificationsLivewire extends Component
{
    use LivewireAlert;
    public function render()
    {
        return view('livewire.central-notifications-livewire');
    }
}
