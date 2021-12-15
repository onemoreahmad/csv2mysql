<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
use Carbon\Carbon;
 
class Chart1 extends Component
{
    public $info;
 
    public function mount()
    { 
        $this->info = SMSFlowBack::limit(12)
        ->get()
        ->mapWithKeys(function ($item, $key) {
            return   [ $item['Date'] => $item['US_DesanderPressurePressure']  ];
        });
    }

    public function render()
    {
 
        return view('livewire.charts.chart1');
    }
}
