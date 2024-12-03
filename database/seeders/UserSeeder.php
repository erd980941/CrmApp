<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password123',
            'role' => 'admin',
            'status' => 'active',
        ]);
        $adminUser->roles()->attach(Role::whereIn('name', ['Admin', 'Manager'])->pluck('id'));
        
        $user = User::create([
            'name' => 'Default User',
            'email' => 'user@example.com',
            'password' => 'password123',
            'role' => 'manager',
            'status' => 'active',
        ]);
        $user->roles()->attach(Role::where('name', 'Sales')->pluck('id'));

        $user = User::create([
            'name' => 'Default Support',
            'email' => 'support@example.com',
            'password' => 'password123',
            'role' => 'support',
            'status' => 'active',
        ]);
        $user->roles()->attach(Role::where('name', 'Support')->pluck('id'));
    }
}
