<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class Chart1 extends Component
{
    public $info;
 
    public function mount()
    {
        // If you want to see all raw data, use this
        // $this->info = SMSFlowBack::select('well_name', 'Date', 'US_DesanderPressurePressure')->orderBy('Date')->get();

        // If you want to remove NULL values from US_DesanderPressurePressure, use this
        // $this->info = SMSFlowBack::select('well_name', 'Date', 'US_DesanderPressurePressure')->whereNotNull('US_DesanderPressurePressure')->orderBy('Date')->get();

        // If you want to see data in date range, use this
        $this->info = SMSFlowBack::select('well_name', 'Date', 'US_DesanderPressurePressure')
            // ->whereDate('Date', '>=', '2020-01-01')
            // ->whereDate('Date', '<=', '2022-09-30')
            ->whereNotNull('US_DesanderPressurePressure')
            ->orderBy('Date')->get();
    }

    public function render()
    {
        return view('livewire.charts.chart1');
    }
}
