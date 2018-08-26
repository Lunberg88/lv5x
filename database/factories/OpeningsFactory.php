<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(App\Openings::class, function (Faker $faker) {

	return [
		'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
		'location' => $faker->country,
		'salary' => $faker->numberBetween(600,3500),
		'description' => $faker->text($maxNbChars = 200),
		'status' => $faker->numberBetween(0,1),
		'img' => 'image_placeholder.jpg',
		'user_id' => '3',
	];
});