<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Stat;
use App\Models\Campain;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class StatsLivewire extends Component
{
    use LivewireAlert;
    
    public $campain;

    public $labels;

    public $impressions;

    public $clicks;

    public $months = 11;

    public $pcs;

    public $tablets;

    public $movils;

    public function render()
    {
        return view('livewire.stats-livewire');
    }

    public function mount($campainID)
    {
        $campain = Campain::findOrFail($campainID);
        $this->campain = $campain;
        $this->getCampain();
    }

    public function getCampain()
    {
        $campain = Campain::find($this->campain->id);
        $thisMonth = now();

        //Obtenemos un aray con todos los monthes segun el number que el usaurio identifique
        $arrayMonths = collect();
        $arrayMonthsOriginal = collect();
        $arrayMonths->add(['name'=>now()->shortLocaleMonth, 'number'=>now()->month]);
        for ($cm = 0; $cm < $this->months; $cm++) {
            $thisMonth = $thisMonth->addMonth();
            $arrayMonths->add(['name'=>$thisMonth->shortLocaleMonth, 'number'=>$thisMonth->month]);
            $arrayMonthsOriginal->add($thisMonth->shortLocaleMonth);
        }

        $impressions = collect();
        $clicks = collect();
        $movils = 0;
        $pcs = 0;
        $tablets = 0;
        foreach ($arrayMonths as $month) {
            $impression = Stat::where('campain_id', $campain->id)->where('type', 'impression')->whereMonth('created_at', $month['number'])->count();
            $click = Stat::where('campain_id', $campain->id)->where('type', 'click')->whereMonth('created_at', $month['number'])->count();
            $movil = Stat::where('campain_id', $campain->id)->where('dispositive', 'movil')->whereMonth('created_at', $month['number'])->count();
            $pc = Stat::where('campain_id', $campain->id)->where('dispositive', 'pc')->whereMonth('created_at', $month['number'])->count();
            $tablet = Stat::where('campain_id', $campain->id)->where('dispositive', 'tablet')->whereMonth('created_at', $month['number'])->count();
            //$impressions->add(['value'=>$stat,'month_name'=>$month['name'],'month'=>$month['number']]);
            $impressions->add($impression);
            $clicks->add($click);
            $movils = $movils + $movil;
            $pcs = $pcs + $pc;
            $tablets = $tablets + $tablet;
        }

        // return dd($impressions);
        //  return dd($campain->id);

        $this->impressions = $impressions;
        $this->clicks = $clicks;
        $this->labels = $arrayMonthsOriginal;
        $this->pcs = $pcs;
        $this->tablets = $tablets;
        $this->movils = $movils;
        //  $this->$clicks=$clicks;
        $this->emit('updated');
    }

    public function changeMonths($months)
    {
        $this->months = $months;

        if ($this->campain) {
            $this->getCampain();
        } else {
            $this->getAllCampain();
        }
    }
}
