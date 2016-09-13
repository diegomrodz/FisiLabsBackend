<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('experiment_id')->nullable(false);
            $table->string('name')->nullable(false);
            
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
        Schema::drop('experiment_groups');
    }
}
