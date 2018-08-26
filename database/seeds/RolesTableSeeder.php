<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->delete();
        $roles = [
            ['id' => 1, 'rolename' => 'user'],
            ['id' => 2, 'rolename' => 'moderator'],
            ['id' => 3, 'rolename' => 'admin'],
            ['id' => 4, 'rolename' => 'globaladmin']
        ];
        DB::table('role')->insert($roles);
    }
}
