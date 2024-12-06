<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'add-user',
                'desc' => 'add-user',
            ],
            [
                'name' => 'update-user',
                'desc' => 'update-user',
            ],
            [
                'name' => 'delete-user',
                'desc' => 'delete-user',
            ],
            [
                'name' => 'add-post',
                'desc' => 'add-post',
            ],
            [
                'name' => 'update-post',
                'desc' => 'update-post',
            ],
            [
                'name' => 'delete-post',
                'desc' => 'delete-post',
            ],
            [
                'name' => 'delete-comment',
                'desc' => 'delete-comment',
            ]
            ]);
        DB::table('permission_role')->insert([
            [
                'role_id' => 1,
                'permission_id' => 1
            ],
            [
                'role_id' => 1,
                'permission_id' => 2
            ],
            [
                'role_id' => 1,
                'permission_id' => 3
            ],
            [
                'role_id' => 1,
                'permission_id' => 4
            ],
            [
                'role_id' => 1,
                'permission_id' => 5
            ],
            [
                'role_id' => 1,
                'permission_id' => 6
            ]
        ]);
    }
}
