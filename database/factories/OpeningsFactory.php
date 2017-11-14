<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(App\Openings::class, function (Faker\Generator $faker) {

	return [
		'title' => str_random(25),
		'location' => $faker->country,
		'salary' => $faker->numberBetween(600,3500),
		'description' => str_random(50),
		'status' => $faker->numberBetween(0,1),
	];
});