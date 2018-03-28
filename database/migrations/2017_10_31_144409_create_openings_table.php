<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('img')->nullable();
            $table->integer('type')->default(0);
            $table->string('tags')->nullable();
            $table->integer('salary')->default(0);
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('openings');
    }
}
