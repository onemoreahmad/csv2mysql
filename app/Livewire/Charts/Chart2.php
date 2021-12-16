<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
 
class Chart2 extends Component
{
    public $info;
 
    public function mount()
    { 
        $this->info = DB::table('sms_flow_back')->select('well_name', DB::raw('MAX(CAST(US_DesanderPressurePressure AS INT)) as maxVal'), DB::raw('MIN(CAST(US_DesanderPressurePressure AS INT)) as minVal'))
            ->groupBy('well_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.charts.chart2');
    }
}
