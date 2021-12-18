<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class ChartArea1 extends Component
{
    public $info;
 
    public function mount()
    {
            $this->info = SMSFlowBack::select('well_name', 'Date', 'US_DesanderPressurePressure')
            // ->whereDate('Date', '>=', '2020-01-01')
            // ->whereDate('Date', '<=', '2022-09-30')
            ->whereNotNull('US_DesanderPressurePressure')
            ->orderBy('Date')->get();
    }

    public function render()
    {
        return view('livewire.charts.chart-area1');
    }
}
