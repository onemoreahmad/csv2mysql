<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class ChartLine1 extends Component
{
    public $info;
 
    public function mount()
    {
        // If you want to see not null values of US_DesanderPressurePressure, use this
        $this->info = SMSFlowBack::select('well_name', 'US_DesanderPressurePressure')->whereNotNull('US_DesanderPressurePressure')->get();

        // If you want to see all raw data, use this
        // $this->info = SMSFlowBack::select('well_name', 'US_DesanderPressurePressure')->get();
    }

    public function render()
    {
        return view('livewire.charts.chart-line1');
    }
}
