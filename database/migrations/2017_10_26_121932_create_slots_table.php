<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('char_id')->unsigned();
            $table->foreign('char_id')->references('user_id')->on('chars');
            $table->integer('slot1');
            $table->integer('slot2');
            $table->integer('slot3');
            $table->integer('slot4');
            $table->integer('slot5');
            $table->integer('slot6');
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
        Schema::dropIfExists('slots');
    }
}
