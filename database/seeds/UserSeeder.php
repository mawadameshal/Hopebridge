<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'jeha_id' => 1,
            'department_id' => 1,
            'is_maneger' => 1,
        ]);
    }
}
