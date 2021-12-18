<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class BarChartForWell extends Component
{
    public $wellFieldName;
    public $chartTitle;
    public $info;
 
    public function mount($wellFieldName)
    {
        // If you want to see not null values of US_DesanderPressurePressure, use this
        $this->info = SMSFlowBack::select('well_name', $wellFieldName)->whereNotNull($wellFieldName)->get();

        // If you want to see all raw data, use this
        // $this->info = SMSFlowBack::select('well_name', 'US_DesanderPressurePressure')->get();
    }

    public function render()
    {
        return view('livewire.charts.bar-chart-for-well');
    }
}
