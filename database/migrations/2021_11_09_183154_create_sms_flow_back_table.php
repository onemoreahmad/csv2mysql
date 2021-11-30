<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsFlowBackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_flow_back', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('well_id')->index(); 
            $table->unsignedBigInteger('user_id')->nullable()->index(); 

            $table->string('field_name', 50)->nullable()->index();
            $table->string('well_number', 10)->nullable()->index();

            $table->timestamp('Date')->nullable();
            $table->text('Remarks')->nullable();
            $table->string('ChokeSize1', 20)->default(0)->nullable();
            $table->string('US_DesanderPressurePressure', 20)->default(0)->nullable();
            $table->string('US_FilterPressure', 20)->default(0)->nullable();
            $table->string('US_ChokePressure1', 20)->default(0)->nullable();
            $table->string('US_DesanderTemperatureTemp', 20)->default(0)->nullable();
            $table->string('DS_ChokePressure1', 20)->default(0)->nullable();
            $table->string('DS_ChokeTemp1', 20)->default(0)->nullable();
            $table->string('ChokeSize2', 20)->default(0)->nullable();
            $table->string('DS_ChokePressure2', 20)->default(0)->nullable();
            $table->string('DS_ChokeTemp2', 20)->default(0)->nullable();
            $table->string('GasVelocity', 20)->default(0)->nullable();
            $table->string('BSWatChoke', 20)->default(0)->nullable();
            $table->string('ProdLinePressure', 20)->default(0)->nullable();





            $table->string('SEPARATOR_SeparatorPressure', 20)->default(0)->nullable();
            $table->string('SEPARATOR_GasTemp', 20)->default(0)->nullable();
            $table->string('SEPARATOR_DiffPressure', 20)->default(0)->nullable();
            $table->string('SEPARATOR_BSWatOiline', 20)->default(0)->nullable();
            $table->string('SEPARATOR_OrifPlateSizeDiam', 20)->default(0)->nullable();
            $table->string('SEPARATOR_OilTemp', 20)->default(0)->nullable();

            $table->string('OilMetercorrectionfactor', 20)->default(0)->nullable();
            $table->string('Watermetercorrectionfactor', 20)->default(0)->nullable();

            $table->string('GasRate_MMSCFD', 20)->default(0)->nullable();
            $table->string('OilRate_STOBD', 20)->default(0)->nullable();
            $table->string('WaterRate_STWBD', 20)->default(0)->nullable();
            $table->string('CGR', 20)->default(0)->nullable();
            $table->string('GORatSC', 20)->default(0)->nullable();
            $table->string('IPRatSurface', 20)->default(0)->nullable();


            $table->string('EstGasRateNewEqu', 20)->default(0)->nullable();
            $table->string('EstGasRateOldEqu', 20)->default(0)->nullable();

            $table->string('OilRate_BBLS', 20)->default(0)->nullable();
            $table->string('Waterrate_BBLS', 20)->default(0)->nullable();
            $table->string('GORatSepConditions', 20)->default(0)->nullable();

            $table->string('GasSpecificGravity', 20)->default(0)->nullable();
            $table->string('CO2', 20)->default(0)->nullable();
            $table->string('H2S', 20)->default(0)->nullable();
            $table->string('Z_factor', 20)->default(0)->nullable();
            $table->string('Viscosity', 20)->default(0)->nullable();
            $table->string('OilGravityat60F', 20)->default(0)->nullable();
            $table->string('OilShrinkageat60F_1_SHK', 20)->default(0)->nullable();
            $table->string('WaterPH', 20)->default(0)->nullable();
            $table->string('Chloride', 20)->default(0)->nullable();

            $table->string('Oil_Bbls', 20)->default(0)->nullable();
            $table->string('Water_Bbls', 20)->default(0)->nullable();

            $table->string('Gas_MMSCF', 20)->default(0)->nullable();
            $table->string('Oil_STOB', 20)->default(0)->nullable();
            $table->string('Water_STWB', 20)->default(0)->nullable();

            $table->string('TCA_2x5_Psig', 20)->default(0)->nullable();
            $table->string('TCA_2x5_F', 20)->default(0)->nullable();
            $table->string('TCA_CCA_5x9_Psig', 20)->default(0)->nullable();
            $table->string('TCA_CCA_5x9_F', 20)->default(0)->nullable();
            $table->string('CCA_9x13_Psig', 20)->default(0)->nullable();
            $table->string('CCA_9x13_F', 20)->default(0)->nullable();
            $table->string('CCA_13x18_Psig', 20)->default(0)->nullable();
            $table->string('CCA_13x18_F', 20)->default(0)->nullable();


            $table->string('VENTURI_StaticPressure', 20)->default(0)->nullable();
            $table->string('VENTURI_DiffPressure', 20)->default(0)->nullable();
            $table->string('VENTURI_Temp', 20)->default(0)->nullable();
            
            $table->string('TypeofRecovery', 20)->default(0)->nullable();
            $table->string('Sand_Percentage', 20)->default(0)->nullable();
            $table->string('Prop_Percentage', 20)->default(0)->nullable();
            $table->string('Sand_Lbs', 20)->default(0)->nullable();
            $table->string('Prop_Lbs', 20)->default(0)->nullable();
            $table->string('CummSand', 20)->default(0)->nullable();
            $table->string('CummProp', 20)->default(0)->nullable();
            $table->string('RecoveryWeight', 20)->default(0)->nullable();
            $table->string('CummWeight', 20)->default(0)->nullable();
            $table->string('DeltaWeightPerHour', 20)->default(0)->nullable();
            $table->string('DeltaWeightperHourperMMSCFD', 20)->default(0)->nullable();
            $table->string('TargetSolidslbs', 20)->default(0)->nullable();
            $table->string('Criteria', 20)->default(0)->nullable();
 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_flow_back');
    }
}
