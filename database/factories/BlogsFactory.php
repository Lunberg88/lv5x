<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {

	$title = $faker->sentence($nbWords = 6, $variableNbWords = true);

	return [
		'title' => $title,
		'slug' => str_slug($title),
		'short' => $faker->text($maxNbChars = 155),
		'full' => $faker->text($maxNbChars = 700),
		'user_id' => 3
	];
});