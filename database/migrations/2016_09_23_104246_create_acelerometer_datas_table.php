<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcelerometerDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acelerometer_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sample_id')->nullable(false);
            $table->double('x')->nullable(false);
            $table->double('y')->nullable(false);
            $table->double('z')->nullable(false);
            $table->timestamp('mesaured_at')->nullable(false);
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
        Schema::drop('acelerometer_datas');
    }
}
