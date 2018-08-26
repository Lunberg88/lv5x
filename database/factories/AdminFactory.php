<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'name' => 'Lexx',
        'email' => 'lunberg88@gmail.com',
        'password' => bcrypt('280388'),
        'remember_token' => str_random(10),
    ];
});