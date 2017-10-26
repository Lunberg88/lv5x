<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharbagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charbag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('char_id')->unsigned();
            $table->foreign('char_id')->references('user_id')->on('chars');
            $table->integer('obj_id')->unsigned();
            $table->foreign('obj_id')->references('id')->on('objects');
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
        Schema::dropIfExists('charbags');
    }
}
