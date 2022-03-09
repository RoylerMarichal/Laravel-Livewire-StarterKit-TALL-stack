<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        Auth::logout();

        return redirect(route('home'));
    }
}
