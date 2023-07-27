<?php

use Illuminate\Database\Seeder;

class PostActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action_types')->insert([
            'name'=>'عمل اللازم',
            'status'=>1,
        ]);
        DB::table('action_types')->insert([
            'name'=>'اعتماد الطلب',
            'status'=>1,
        ]);
        DB::table('action_types')->insert([
            'name'=>'رفض الطلب',
            'status'=>1,
        ]);
    }
}
