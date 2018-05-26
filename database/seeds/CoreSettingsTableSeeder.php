<?php

use Illuminate\Database\Seeder;

class CoreSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_settings')->delete();
        $option_stacks = [
            [
                'id' => 1,
                'key' => 'main_stacks',
                'value' => 'Frontend, Backend, FullStack, Mobile, Design, Traders, DevOps, Project Manager, Product Manager, Sales Manager, CTO',
                'created_at' => null,
                'updated_at' => null

            ],
        ];
        DB::table('core_settings')->insert($option_stacks);
    }
}
