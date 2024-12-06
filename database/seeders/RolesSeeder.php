<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Manager',
        ]);
        DB::table('roles')->insert([
            'name' => 'New User',
        ]);
        DB::table('roles')->insert([
            'name' => 'Active User',
        ]);
        
    }
}
