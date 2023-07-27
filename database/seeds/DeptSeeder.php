<?php

use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'البرمجة وتحليل النظم',
            'status' => 1,
            'jeha_id' => 1,
        ]);
    }
}
