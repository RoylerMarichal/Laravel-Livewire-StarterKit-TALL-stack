<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Stat;
use App\Models\User;
use App\Models\Campain;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class StatsGeneralLivewire extends Component
{
    use LivewireAlert;
    
    public $campain;

    public $labels;

    public $impressions;

    public $users;

    public $months = 11;

    public $pcs;

    public $tablets;

    public $movils;

    public function render()
    {
        return view('livewire.stats-general-livewire');
    }

    public function mount()
    {
        $this->getStats();
    }

    public function getStats()
    {
        $thisMonth = now()->subMonth(1);
        //Array of months
        $arrayMonths = collect();
        $arrayMonthsOriginal = collect();
        $arrayMonths->add(['name'=>now()->shortLocaleMonth, 'number'=>now()->month]);
        for ($cm = 0; $cm < $this->months + 1; $cm++) {
            $thisMonth = $thisMonth->addMonth();
            $arrayMonths->add(['name'=>$thisMonth->shortLocaleMonth, 'number'=>$thisMonth->month]);
            $arrayMonthsOriginal->add($thisMonth->shortLocaleMonth);
        }

        $impressions = collect();
        $users = collect();
        $movils = 0;
        $pcs = 0;
        $tablets = 0;
        foreach ($arrayMonths as $month) {
            $impression = Stat::whereMonth('created_at', $month['number'])->count();
            $user = User::whereMonth('created_at', $month['number'])->count();
            $movil = Stat::where('dispositive', 'movil')->whereMonth('created_at', $month['number'])->count();
            $pc = Stat::where('dispositive', 'pc')->whereMonth('created_at', $month['number'])->count();
            $tablet = Stat::where('dispositive', 'tablet')->whereMonth('created_at', $month['number'])->count();

            $impressions->add($impression);
            $users->add($user);
            $movils = $movils + $movil;
            $pcs = $pcs + $pc;
            $tablets = $tablets + $tablet;
        }

        $this->impressions = $impressions;
        $this->users = $users;
        $this->labels = $arrayMonthsOriginal;
        $this->pcs = $pcs;
        $this->tablets = $tablets;
        $this->movils = $movils;
    }
}
