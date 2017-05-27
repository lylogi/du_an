<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiochemicalValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biochemical_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor');
            $table->string('hospital');
            $table->float('num_Chol');
            $table->float('num_CPR');
            $table->float('num_Gly');
            $table->float('num_Trig');
            $table->float('num_THS');
            $table->string('detail');
            $table->integer('user_id');
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
        Schema::dropIfExists('biochemical_values');
    }
}
