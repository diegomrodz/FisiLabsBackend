<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperimentGroupDeviceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiment_groups', function (Blueprint $table) {
            $table->string('experiment_device')->nullable(true);
            $table->double('scale_error')->nullable(true);
            $table->unsignedInteger('decimal_places')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiment_groups', function (Blueprint $table) {
            $table->dropColumn('experiment_device');
            $table->dropColumn('scale_error');
            $table->dropColumn('experiment_device');
            $table->dropColumn('decimal_places');
        });
    }
}
