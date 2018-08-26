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
            $table->string('slug');
            $table->string('location')->nullable();
            $table->string('img')->default('image_placeholder.jpg');
            $table->integer('type')->default(0);
            $table->string('tags')->nullable();
            $table->integer('salary')->default(0);
            $table->string('rate')->nullable();
            $table->text('description')->nullable();
            $table->integer('active')->default(1);
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
