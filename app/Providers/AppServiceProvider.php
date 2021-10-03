<?php

namespace App\Providers;

use App\Models\Setting;
use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $env=config('values.env');
       if($env=='production'){
           View::share('setting', Setting::first());
       }
    }
}
