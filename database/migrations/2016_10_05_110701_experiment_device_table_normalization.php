<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperimentDeviceTableNormalization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiment_devices', function (Blueprint $table) {
            $table->double('quadratic_average_deviation')->nullable(true);
            $table->double('average')->nullable(true);
            $table->double('standard_deviation')->nullable(true);
            $table->double('total_error')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiment_devices', function (Blueprint $table) {
            $table->dropColumn('quadratic_average_deviation');
            $table->dropColumn('standard_deviation');
            $table->dropColumn('average');
            $table->dropColumn('total_error');
        });
    }
}
