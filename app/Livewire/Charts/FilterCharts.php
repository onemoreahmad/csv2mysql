<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\Well;

class FilterCharts extends Component
{
    public $all = true;
    public $wells = [];
    public $selectedWells = [];

    public function mount()
    {
        $this->wells = Well::all();
        // $this->selectedWells = $this->wells->keyBy('id')->keys();

        $this->wells->map(function ($item)
        {
            array_push($this->selectedWells, $item->id); 
        });
        
        // $this->selectedWells = $this->selectedWells = $this->wells->map(function ($item)
        // {
        //     dd($item);
        // });
    }
 
    public function updatedAll($value)
    {
        $this->selectedWells = [];
        // $this->wells->map(function ($item)
        // {
        //     array_push($this->selectedWells, $item->id);
            
        // });
      
    }

    public function render()
    {
        return view('livewire.charts.filter-charts');
    }
}
