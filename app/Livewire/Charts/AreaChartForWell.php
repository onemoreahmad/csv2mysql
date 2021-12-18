<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class AreaChartForWell extends Component
{
    public $wellFieldName;
    public $chartTitle;
    public $info;
 
    public function mount($wellFieldName)
    {
        $this->info = SMSFlowBack::select('well_name', 'Date', $wellFieldName)
        // ->whereDate('Date', '>=', '2020-01-01')
        // ->whereDate('Date', '<=', '2022-09-30')
        ->whereNotNull($wellFieldName)
        ->orderBy('Date')->get();
    }

    public function render()
    {
        return view('livewire.charts.area-chart-for-well');
    }
}
