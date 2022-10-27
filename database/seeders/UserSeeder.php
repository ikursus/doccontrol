<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('pass123'),
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Abu',
            'email' => 'abu@gmail.com',
            'password' => bcrypt('pass123'),
            'status' => 'inactive'
        ]);

        DB::table('users')->insert([
            'name' => 'Siti',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('pass123'),
            'status' => 'pending'
        ]);

        DB::table('users')->insert([
            'name' => 'Muthu',
            'email' => 'muthu@gmail.com',
            'password' => bcrypt('pass123'),
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Ah Chong',
            'email' => 'ahchong@gmail.com',
            'password' => bcrypt('pass123'),
            'status' => 'banned'
        ]);
    }
}
