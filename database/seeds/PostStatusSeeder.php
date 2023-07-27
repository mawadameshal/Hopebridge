<?php

use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_statuses')->insert([
            'name' =>'منجز',
            'status' =>1,
        ]);

        DB::table('post_statuses')->insert([
            'name' =>'غير منجز',
            'status' =>1,
        ]);

        DB::table('post_statuses')->insert([
            'name' =>'قيد العمل',
            'status' =>1,
        ]);
    }
}
