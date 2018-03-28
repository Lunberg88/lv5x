<?php

use Illuminate\Database\Seeder;

class UserToRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();
        $roles = [
            ['id' => 1, 'user_id' => 1, 'role_id' => 4],
        ];
        DB::table('role_user')->insert($roles);
    }
}
