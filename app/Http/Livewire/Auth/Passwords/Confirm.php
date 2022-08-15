<?php

namespace App\Http\Livewire\Auth\Passwords;

use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class Confirm extends Component
{
    use UsesSpamProtection;

    public HoneypotData $extraFields;

    /** @var string */
    public $password = '';

    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    public function confirm()
    {
        $this->protectAgainstSpam(); // if is spam, will abort the request

        $this->validate([
            'password' => 'required|password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm')->extends('layouts.auth');
    }
}
