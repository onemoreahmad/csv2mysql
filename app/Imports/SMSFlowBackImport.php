<?php

namespace App\Imports;

use App\Models\SMSFlowBack;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithValidation;

class SMSFlowBackImport implements ToModel, WithStartRow
{
    public $wellId;
    public $wellNumber;
    public $fieldName;
 
    function __construct($wellId, $wellNumber, $fieldName) {
        $this->wellId =  $wellId;
        $this->wellNumber =  $wellNumber;
        $this->fieldName =  $fieldName;
    }
 
    public function model(array $row)
    {
      
        $model = new SMSFlowBack();
        $model->well_id = $this->wellId; 
        $model->well_number = $this->wellNumber; 
        $model->well_name = $this->fieldName; 
        $model->user_id = auth()->id() ?: null; 
 
        // $model->Date = \Carbon\Carbon::createFromFormat('n/j/y H:i', $row[1]); 
        $model->Date = \Carbon\Carbon::parse($row[1]); 
        $model->Remarks = data_get($row, '2', 0);
        $model->ChokeSize1 = data_get($row, '3', 0);
        
        // for testing 
        if($this->fieldName == 'bri_test'){
            $model->US_DesanderPressurePressure = data_get($row, '4')  > 0 ? (integer)data_get($row, '4', 0) + 1200 : data_get($row, '4', 0);
            $model->SEPARATOR_SeparatorPressure = data_get($row, '16')  > 0 ? (integer)data_get($row, '16', 0) + 130 : data_get($row, '4', 0);
            $model->SEPARATOR_GasTemp = data_get($row, '17')  > 0 ? (integer)data_get($row, '17', 0) + 50 : data_get($row, '4', 0);
        }else {
            $model->US_DesanderPressurePressure = data_get($row, '4', 0) ;
            $model->SEPARATOR_SeparatorPressure = data_get($row, '16', 0);
            $model->SEPARATOR_GasTemp = data_get($row, '17', 0);
        }

        $model->US_FilterPressure = data_get($row, '5', 0);
        $model->US_ChokePressure1 = data_get($row, '6', 0);
        $model->US_DesanderTemperatureTemp = data_get($row, '7', 0);
        $model->DS_ChokePressure1 = data_get($row, '8', 0);
        $model->DS_ChokeTemp1 = data_get($row, '9', 0);
        $model->ChokeSize2 = data_get($row, '10', 0);
        $model->DS_ChokePressure2 = data_get($row, '11', 0);
        $model->DS_ChokeTemp2 = data_get($row, '12', 0);
        $model->GasVelocity = data_get($row, '13', 0);
        $model->BSWatChoke = data_get($row, '14', 0);
        $model->ProdLinePressure = data_get($row, '15', 0);

        $model->SEPARATOR_DiffPressure = data_get($row, '18', 0);
        $model->SEPARATOR_BSWatOiline = data_get($row, '19', 0);
        $model->SEPARATOR_OrifPlateSizeDiam = data_get($row, '20', 0);
        $model->SEPARATOR_OilTemp = data_get($row, '21', 0);

        $model->OilMetercorrectionfactor = data_get($row, '22', 0);
        $model->Watermetercorrectionfactor = data_get($row, '23', 0);

        $model->GasRate_MMSCFD = data_get($row, '24', 0);
        $model->OilRate_STOBD = data_get($row, '25', 0);
        $model->WaterRate_STWBD = data_get($row, '26', 0);
        $model->CGR = data_get($row, '27', 0);
        $model->GORatSC = data_get($row, '28', 0);
        $model->IPRatSurface = data_get($row, '29', 0);


        $model->EstGasRateNewEqu = data_get($row, '30', 0);
        $model->EstGasRateOldEqu = data_get($row, '31', 0);

        $model->OilRate_BBLS = data_get($row, '31', 0);
        $model->Waterrate_BBLS = data_get($row, '32', 0);
        $model->GORatSepConditions = data_get($row, '33', 0);

        $model->GasSpecificGravity = data_get($row, '34', 0);
        $model->CO2 = data_get($row, '35', 0);
        $model->H2S = data_get($row, '36', 0);
        $model->Z_factor = data_get($row, '37', 0);
        $model->Viscosity = data_get($row, '38', 0);
        $model->OilGravityat60F = data_get($row, '39', 0);
        $model->OilShrinkageat60F_1_SHK = data_get($row, '40', 0);
        $model->WaterPH = data_get($row, '41', 0);
        $model->Chloride = data_get($row, '42', 0);

        $model->Oil_Bbls = data_get($row, '43', 0);
        $model->Water_Bbls = data_get($row, '44', 0);

        $model->Gas_MMSCF = data_get($row, '45', 0);
        $model->Oil_STOB = data_get($row, '46', 0);
        $model->Water_STWB = data_get($row, '47', 0);

        $model->TCA_2x5_Psig = data_get($row, '48', 0);
        $model->TCA_2x5_F = data_get($row, '49', 0);
        $model->TCA_CCA_5x9_Psig = data_get($row, '50', 0);
        $model->TCA_CCA_5x9_F = data_get($row, '51', 0);
        $model->CCA_9x13_Psig = data_get($row, '52', 0);
        $model->CCA_9x13_F = data_get($row, '53', 0);
        $model->CCA_13x18_Psig = data_get($row, '54', 0);
        $model->CCA_13x18_F = data_get($row, '55', 0);


        $model->VENTURI_StaticPressure = data_get($row, '56', 0);
        $model->VENTURI_DiffPressure = data_get($row, '57', 0);
        $model->VENTURI_Temp = data_get($row, '58', 0);
        
        $model->TypeofRecovery = data_get($row, '59', 0);
        $model->Sand_Percentage = data_get($row, '60', 0);
        $model->Prop_Percentage = data_get($row, '61', 0);
        $model->Sand_Lbs = data_get($row, '62', 0);
        $model->Prop_Lbs = data_get($row, '63', 0);
        $model->CummSand = data_get($row, '64', 0);
        $model->CummProp = data_get($row, '65', 0);
        $model->RecoveryWeight = data_get($row, '66', 0);
        $model->CummWeight = data_get($row, '67', 0);
        $model->DeltaWeightPerHour = data_get($row, '68', 0);
        $model->DeltaWeightperHourperMMSCFD = data_get($row, '69', 0);
        $model->TargetSolidslbs = data_get($row, '70', 0);
        $model->Criteria = data_get($row, '71', 0);

        return $model; 
    }

    public function startRow(): int
    {
        return 14;
    }
}
