<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data 1
        DB::table('roles')->insert([
            'name' => 'ADMIN',
            'description' => 'Sebagai Admin'
        ]);

        // Data 2
        DB::table('roles')->insert([
            'name' => 'USER',
            'description' => 'Sebagai User'
        ]);
    }
}
