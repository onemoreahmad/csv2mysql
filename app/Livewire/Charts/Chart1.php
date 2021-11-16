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
        $this->info = SMSFlowBack::whereBetween('Date', [(new Carbon)->subDays(360)->startOfDay()->toDateString(), (new Carbon)->now()->endOfDay()->toDateString()])
                                ->limit(12)
                                // ->pluck('US_DesanderPressurePressure', 'Date')
                                ->get()
                                ->mapWithKeys(function ($item, $key) {
                                    // return   [Carbon::parse($item['Date'])->format('Y m') =>   $item['US_DesanderPressurePressure']  ];
                                    return   [ $item['Date'] => $item['US_DesanderPressurePressure']  ];
                                    // return   [$key => [$item['Date'], $item['US_DesanderPressurePressure']] ];
                                })
                                ;
  
    }

    public function render()
    {
        return view('livewire.charts.chart1');
    }
}
