<?php

use Illuminate\Database\Seeder;

class PostType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert([
            'name' => 'صادر',
        ]);


        DB::table('post_types')->insert([
            'name' => 'وارد',
        ]);


        DB::table('post_types')->insert([
            'name' => 'قيد داخلي',
        ]);
    }
}
