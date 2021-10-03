<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    //General
    Route::get('/', App\Http\Livewire\LandingLivewire::class)->name('landing');
    Route::get('/home', App\Http\Livewire\HomeLivewire::class)->name('home')->middleware('auth');
    Route::get('/profile/{userID}', App\Http\Livewire\ProfileLivewire::class)->name('profile');
    Route::get('/stats', App\Http\Livewire\StatsLivewire::class)->name('stats')->middleware('auth');

    //Invoices
    Route::get('/home/invoices', App\Http\Livewire\InvoicesLivewire::class)->name('agency_invoices')->middleware('auth');
    Route::get('/invoices/{invoiceId}', App\Http\Livewire\ViewInvoiceLivewire::class)->name('view_invoice')->middleware('auth');

    //Orders
    Route::get('/home/orders', App\Http\Livewire\OrdersLivewire::class)->name('orders')->middleware('auth');

    //Admin - Clients
    Route::get('/dmin/clients', App\Http\Livewire\ClientsLivewire::class)->name('agency_clients')->middleware('auth');
    Route::get('/admin/setting', App\Http\Livewire\AdminSettingLivewire::class)->name('agency_setting')->middleware('auth');
    Route::get('/admin/services', App\Http\Livewire\AdminServicesLivewire::class)->name('admin_services')->middleware('admin');
    Route::get('/admin/orders', App\Http\Livewire\AdminOrderLivewire::class)->name('admin_order')->middleware('admin');
    Route::get('/notifications', App\Http\Livewire\CentralNotificationsLivewire::class)->name('central_notifications')->middleware('auth');
    Route::get('/tickets', App\Http\Livewire\TicketsLivewire::class)->name('tickets')->middleware('auth');

        Route::get('/exit', function(){
            Auth::logout();
            return redirect('/');
        });

    Route::middleware('guest')->group(function () {
        Route::get('login', Login::class)
            ->name('login');

        Route::get('register', Register::class)
            ->name('register');
    });

    Route::get('password/reset', Email::class)
        ->name('password.request');

    Route::get('password/reset/{token}', Reset::class)
        ->name('password.reset');

    Route::middleware('auth')->group(function () {
        Route::get('email/verify', Verify::class)
            ->middleware('throttle:6,1')
            ->name('verification.notice');

        Route::get('password/confirm', Confirm::class)
            ->name('password.confirm');
    });

    Route::middleware('auth')->group(function () {
        Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware('signed')
            ->name('verification.verify');

        Route::post('logout', LogoutController::class)
            ->name('logout');
    });

    Route::get('/billing-portal', function (Request $request) {
        //Auth::user()->createAsStripeCustomer();
        return $request->user()->redirectToBillingPortal();
    });

    //webhook
    Route::get('/api/qvapay/pay/', [\App\Http\Controllers\QvaPayController::class, 'webhook']);
    Route::get('/api/qvapay/cancel', [\App\Http\Controllers\QvaPayController::class, 'cancel']);
