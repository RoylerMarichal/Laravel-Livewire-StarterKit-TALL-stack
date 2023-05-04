<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChangeLangs extends Component
{
    use LivewireAlert;
    public function render()
    {
        return view('livewire.change-langs');
    }

    public function set($lang)
    {
        App::setlocale($lang);
        session()->put('locale', $lang);
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }

        return redirect('/');
        //     App::setLocale($lang);
        //  Artisan::call('config:cache');
    }
}
