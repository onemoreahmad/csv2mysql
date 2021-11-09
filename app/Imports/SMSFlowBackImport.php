<?php

namespace App\Imports;

use App\Models\SMSFlowBack;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;

class SMSFlowBackImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $model = new SMSFlowBack();
        $model->Date = \Carbon\Carbon::parse($row[1]); 
        $model->Remarks = $row[2]; 
        $model->ChokeSize1 = $row[3]; 
        $model->US_DesanderPressurePressure = $row[4]; 
        $model->US_FilterPressure = $row[5]; 
        $model->US_ChokePressure1 = $row[6]; 

        return $model; 
    }

    public function startRow(): int
    {
        return 14;
    }
}
