<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(JehaSeeder::class);
//         $this->call(DeptSeeder::class);
         $this->call(UserSeeder::class);
//         $this->call(PostType::class);
//         $this->call(PostInOutSeeder::class);
//         $this->call(PostActionSeeder::class);
//         $this->call(PostStatusSeeder::class);
    }
}
