<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $areaCharts = [['title'=> 'Wellhead Pressure', 'field'=> 'US_DesanderPressurePressure'],
                ['title'=> 'Sep Pressure', 'field'=> 'SEPARATOR_SeparatorPressure'],
                ['title'=> 'Sep Temperature', 'field'=> 'SEPARATOR_GasTemp'],
                ['title'=> 'GOR', 'field'=> 'GORatSC'],
                ['title'=> 'CGR', 'field'=> 'CGR']];
        
        $barCharts = [['title'=> 'U/S Desander Pressure', 'field'=> 'US_DesanderPressurePressure'],
                ['title'=> 'U/S Desander Temperature Temp', 'field'=> 'US_DesanderTemperatureTemp'],
                ['title'=> 'Gas Rate', 'field'=> 'GasRate_MMSCFD'],
                ['title'=> 'Oil Rate', 'field'=> 'OilRate_STOBD'],
                ['title'=> 'Water Rate', 'field'=> 'WaterRate_STWBD'],
                ['title'=> 'CO2', 'field'=> 'CO2'],
                ['title'=> 'H2S', 'field'=> 'H2S'],
                ['title'=> 'Water PH', 'field'=> 'WaterPH']];
        

        return view('livewire.home', compact('areaCharts', 'barCharts'));
    }
}
