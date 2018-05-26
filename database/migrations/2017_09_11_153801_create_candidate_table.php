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
        	$table->string('stack')->nullable();
        	$table->string('tags')->nullable();
        	$table->integer('salary')->default(0);
        	$table->string('currency')->default(1);
        	$table->string('rate')->nullable();
        	$table->string('cvs')->default('http://');
        	$table->string('upload_cvs')->nullable();
        	$table->integer('status')->default(0);
        	$table->integer('viewed')->default(0);
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
        Schema::dropIfExists('candidate');
    }
}
