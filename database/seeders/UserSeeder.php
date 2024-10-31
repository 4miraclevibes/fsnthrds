<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'user',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
