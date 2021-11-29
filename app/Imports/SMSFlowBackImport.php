<?php

namespace App\Imports;

use App\Models\SMSFlowBack;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithValidation;

class SMSFlowBackImport implements ToModel, WithStartRow
{
    public $field_name;
    public $well_number;

    function __construct($field_name, $well_number) {
        $this->field_name = $field_name;
        $this->well_number = $well_number;
    }
 
    public function model(array $row)
    {
        $model = new SMSFlowBack();
        $model->field_name = $this->field_name; 
        $model->well_number = $this->well_number; 

        $model->Date = \Carbon\Carbon::parse($row[1]); 
        $model->Remarks = $row[2]; 
        $model->ChokeSize1 = $row[3]; 
        $model->US_DesanderPressurePressure = $row[4]; 
        $model->US_FilterPressure = $row[5]; 
        $model->US_ChokePressure1 = $row[6]; 
        $model->US_DesanderTemperatureTemp = $row[7]; 
        $model->DS_ChokePressure1 = $row[8]; 
        $model->DS_ChokeTemp1 = $row[9]; 
        $model->ChokeSize2 = $row[10]; 
        $model->DS_ChokePressure2 = $row[11]; 
        $model->DS_ChokeTemp2 = $row[12]; 
        $model->GasVelocity = $row[13]; 
        $model->BSWatChoke = $row[14]; 
        $model->ProdLinePressure = $row[15]; 

 

        $model->SEPARATOR_SeparatorPressure = $row[16];
        $model->SEPARATOR_GasTemp = $row[17];
        $model->SEPARATOR_DiffPressure = $row[18];
        $model->SEPARATOR_BSWatOiline = $row[19];
        $model->SEPARATOR_OrifPlateSizeDiam = $row[20];
        $model->SEPARATOR_OilTemp = $row[21];

        $model->OilMetercorrectionfactor = $row[22];
        $model->Watermetercorrectionfactor = $row[23];

        $model->GasRate_MMSCFD = $row[24];
        $model->OilRate_STOBD = $row[25];
        $model->WaterRate_STWBD = $row[26];
        $model->CGR = $row[27];
        $model->GORatSC = $row[28];
        $model->IPRatSurface = $row[29];


        $model->EstGasRateNewEqu = $row[30];
        $model->EstGasRateOldEqu = $row[31];

        $model->OilRate_BBLS = $row[31];
        $model->Waterrate_BBLS = $row[32];
        $model->GORatSepConditions = $row[33];

        $model->GasSpecificGravity = $row[34];
        $model->CO2 = $row[35];
        $model->H2S = $row[36];
        $model->Z_factor = $row[37];
        $model->Viscosity = $row[38];
        $model->OilGravityat60F = $row[39];
        $model->OilShrinkageat60F_1_SHK = $row[40];
        $model->WaterPH = $row[41];
        $model->Chloride = $row[42];

        $model->Oil_Bbls = $row[43];
        $model->Water_Bbls = $row[44];

        $model->Gas_MMSCF = $row[45];
        $model->Oil_STOB = $row[46];
        $model->Water_STWB = $row[47];

        $model->TCA_2x5_Psig = $row[48];
        $model->TCA_2x5_F = $row[49];
        $model->TCA_CCA_5x9_Psig = $row[50];
        $model->TCA_CCA_5x9_F = $row[51];
        $model->CCA_9x13_Psig = $row[52];
        $model->CCA_9x13_F = $row[53];
        $model->CCA_13x18_Psig = $row[54];
        $model->CCA_13x18_F = $row[55];


        $model->VENTURI_StaticPressure = $row[56];
        $model->VENTURI_DiffPressure = $row[57];
        $model->VENTURI_Temp = $row[58];
        
        $model->TypeofRecovery = $row[59];
        $model->Sand_Percentage = $row[60];
        $model->Prop_Percentage = $row[61];
        $model->Sand_Lbs = $row[62];
        $model->Prop_Lbs = $row[63];
        $model->CummSand = $row[64];
        $model->CummProp = $row[65];
        $model->RecoveryWeight = $row[66];
        $model->CummWeight = $row[67];
        $model->DeltaWeightPerHour = $row[68];
        $model->DeltaWeightperHourperMMSCFD = $row[69];
        $model->TargetSolidslbs = $row[70];
        $model->Criteria = $row[71];

        return $model; 
    }

    public function startRow(): int
    {
        return 14;
    }
}
