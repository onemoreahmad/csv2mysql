<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\SMSFlowBack;
 
class Chart3Test extends Component
{
    public $info;
 
    public function mount()
    {
        $this->info = SMSFlowBack::orderBy('Date')->get();
    }

    public function render()
    {
        return view('livewire.charts.chart3test');
    }
}
