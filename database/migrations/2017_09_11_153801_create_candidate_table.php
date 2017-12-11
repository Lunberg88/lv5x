<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function(Blueprint $table) {
        	$table->increments('id');
        	$table->string('fio');
        	$table->string('email')->unique();
        	$table->string('stack');
        	$table->string('tags');
        	$table->integer('salary');
        	$table->string('cvs');
        	$table->integer('status')->default('0');
        	$table->integer('viewed')->default('0');
        	$table->integer('user_id')->unsigned();
        	$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate');
    }
}
