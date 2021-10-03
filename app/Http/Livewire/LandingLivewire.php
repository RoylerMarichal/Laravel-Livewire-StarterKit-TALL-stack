<?php

namespace App\Http\Livewire;


use Livewire\Component;

class LandingLivewire extends Component
{
    public function render()
    {
        return view('livewire.landing-livewire')->extends('layouts.appLanding');
    }

    public function mount(){
        //
    }

}
