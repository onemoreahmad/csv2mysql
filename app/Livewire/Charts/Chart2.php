<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class Chart2 extends Component
{
    public $info;
 
    public function mount()
    {
        $this->info = SMSFlowBack::get();
    }

    public function render()
    {
        return view('livewire.charts.chart2');
    }
}
