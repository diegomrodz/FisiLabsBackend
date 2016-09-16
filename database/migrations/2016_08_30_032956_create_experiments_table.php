<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('creator_id')->nullable(false);
            $table->unsignedInteger('classroom_id')->nullable(false);

            $table->string('name')->nullable(false);
            $table->text('description')->nullable(true);

            $table->string('measure_device')->nullable(false);
            $table->double('scale_error')->nullable(false);
            $table->unsignedInteger('sig_figures')->nullable(true);
            $table->string('unit')->nullable(false);
            $table->string('unit_name')->nullable(false);

            $table->double('average')->nullable(true);
            $table->double('quadratic_average_deviation')->nullable(true);
            $table->double('standard_deviation')->nullable(true);
            $table->double('sistematic_error')->nullable(true);
            $table->double('total_error')->nullable(true);

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
        Schema::drop('experiments');
    }
}
