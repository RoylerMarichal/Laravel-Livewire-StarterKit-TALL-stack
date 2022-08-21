<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class LandingLivewire extends Component
{
    public $setting;

    public function render()
    {
        return view('livewire.landing-livewire')->extends('layouts.appLanding');
    }

    public function mount()
    {
        $this->setting = Setting::getAllSettings();
    }
}
