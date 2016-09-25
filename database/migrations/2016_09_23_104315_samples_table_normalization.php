<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SamplesTableNormalization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->double('composed_result')->nullable(true);
            $table->double('composition_equation')->nullable(true);

            $table->double('average')->nullable(true);
            $table->double('quadratic_average_deviation')->nullable(true);
            $table->double('standard_deviation')->nullable(true);
            $table->double('sistematic_error')->nullable(true);
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
        Schema::table('samples', function (Blueprint $table) {
            $table->dropColumn('composed_result');
            $table->dropColumn('composition_equation');
            $table->dropColumn('average');
            $table->dropColumn('quadratic_average_deviation');
            $table->dropColumn('standard_deviation');
            $table->dropColumn('sistematic_error');
            $table->dropColumn('total_error');
        });
    }
}
