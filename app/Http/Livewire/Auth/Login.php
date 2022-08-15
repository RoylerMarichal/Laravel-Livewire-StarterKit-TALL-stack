<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class Login extends Component
{
    use UsesSpamProtection;

    public HoneypotData $extraFields;

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    public $recaptcha;

    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    public function authenticate()
    {
        $this->protectAgainstSpam(); // if is spam, will abort the request

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'recaptcha' => config('captcha.secret') ? 'required|captcha' : 'nullable',
        ]);

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
