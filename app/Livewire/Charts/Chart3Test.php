<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class Chart3Test extends Component
{
    public $info;
 
    public function mount()
    { 
        // this is just a test .. 
        $this->info = SMSFlowBack::limit(12)->get()->mapWithKeys(function ($item, $key) {
                return   [ $item['Date'] => $item['US_DesanderPressurePressure']  ];
            });
    }

    public function render()
    {
        return view('livewire.charts.chart3test');
    }
}
