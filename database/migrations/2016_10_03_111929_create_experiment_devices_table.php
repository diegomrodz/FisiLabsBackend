<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('experiment_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->text('desc')->nullable(true);
            
            $table->double('scale_error')->nullable(false);
            $table->double('sistematic_error')->nullable(false);
            $table->integer('decimal_places')->nullable(false);

            $table->boolean('active')->default(true);
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
        Schema::drop('experiment_devices');
    }
}
