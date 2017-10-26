<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dur_min')->default(0);
            $table->integer('dur_max')->default(0);
	        $table->integer('strength')->default('5');
	        $table->integer('dexterity')->default('5');
	        $table->integer('intuition')->default('5');
	        $table->integer('stamina')->default('5');
	        $table->integer('intelect')->default('5');
	        $table->integer('mana')->default('5');
	        $table->integer('axe_master')->default('3');
	        $table->integer('knife_master')->default('3');
	        $table->integer('staff_master')->default('3');
	        $table->integer('sword_master')->default('3');
	        $table->integer('bow_master')->default('3');
	        $table->integer('stick_master')->default('3');
	        $table->integer('fire_master')->default('3');
	        $table->integer('water_master')->default('3');
	        $table->integer('earth_master')->default('3');
	        $table->integer('air_master')->default('3');
	        $table->integer('min_hit')->default('10');
	        $table->integer('max_hit')->default('15');
	        $table->integer('ar_head')->default('1');
	        $table->integer('ar_chest')->default('1');
	        $table->integer('ar_belt')->default('1');
	        $table->integer('ar_foots')->default('1');
	        $table->integer('ar_fire')->default('0');
	        $table->integer('ar_water')->default('0');
	        $table->integer('ar_earth')->default('0');
	        $table->integer('ar_air')->default('0');
	        $table->integer('power')->default('0');
	        $table->integer('magic_power')->default('0');
	        $table->integer('critical_hit')->default('0');
	        $table->integer('dodge')->default('0');
	        $table->integer('magic_critical')->default('0');
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
        Schema::dropIfExists('objects');
    }
}
