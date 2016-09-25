<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExperimentMultipleDeviceOptionsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiments', function (Blueprint $table) {
            $table->boolean('using_multiple_devices')->default(false);
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
            $table->dropColumn('using_multiple_devices');
        });
    }
}
