<?php

use Illuminate\Database\Seeder;

class PostInOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_in_outs')->insert([
            'name' =>'داخلي',
        ]);


        DB::table('post_in_outs')->insert([
            'name' =>'خارجي',
        ]);
    }
}
