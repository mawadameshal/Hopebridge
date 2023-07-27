<?php

use Illuminate\Database\Seeder;

class JehaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jehas')->insert([
            'name' => 'وحدة تكنولوجيا المعلومات',
            'status' => '1',
            'type' => '1',
        ]);

        DB::table('jehas')->insert([
            'name' => 'الاتصالات الادارية',
            'status' => 1,
            'type' => 1,
        ]);
    }
}
