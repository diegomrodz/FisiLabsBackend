<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperimentMeasuresTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiments', function (Blueprint $table) {
            /**
             * single - medidas únicas
             * multiple - medidas múltiplas por medição
             * composed - medidas compostas de várias variáveis (definda por resultado entre elas)
             * ranged - todas medidas habitam um intervalo bem definido
             * acelerometer - medidas feitas com o acelerometro
             * chronometer - medidas feitas com o cronometro
             */
            $table->string('measure_type')->default('single'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiments', function (Blueprint $table) {
            $table->dropColumn('measure_type');
        });
    }
}
