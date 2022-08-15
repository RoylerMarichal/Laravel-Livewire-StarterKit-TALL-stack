<?php

namespace App\Http\Livewire\Auth\Passwords;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class Email extends Component
{
    use UsesSpamProtection;

    public HoneypotData $extraFields;

    /** @var string */
    public $email;

    /** @var string|null */
    public $emailSentMessage = false;

    public $recaptcha;

    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    public function sendResetPasswordLink()
    {
        $this->protectAgainstSpam(); // if is spam, will abort the request

        $this->validate([
            'email' => ['required', 'email'],
            'recaptcha' => config('captcha.secret') ? ['required', 'captcha'] : ['nullable'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    public function render()
    {
        return view('livewire.auth.passwords.email')->extends('layouts.auth');
    }
}
