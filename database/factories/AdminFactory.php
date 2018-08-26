<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'name' => 'Lexx',
        'email' => 'some@test.com',
        'password' => bcrypt('sometest'),
        'remember_token' => str_random(10),
    ];
});