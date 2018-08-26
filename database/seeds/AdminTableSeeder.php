<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory( App\User::class, 1 )->create([
	        'name' => 'Lexx',
            'email' => 'some@test.com',
            'password' => bcrypt('sometest'),
            'admin' => 1,
            'remember_token' => str_random(10),
        ]);
    }
}
