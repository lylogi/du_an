<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrineTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urine_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor');
            $table->string('hospital');
            $table->float('inBIL');
            $table->float('inBLD');
            $table->float('inGLU');
            $table->float('inKET');
            $table->float('inLEU');
            $table->float('inNIT');
            $table->float('inPH');
            $table->float('inPRO');
            $table->float('inSG');
            $table->float('inUBG');
            $table->float('inACD');
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
        Schema::dropIfExists('urine_tests');
    }
}
