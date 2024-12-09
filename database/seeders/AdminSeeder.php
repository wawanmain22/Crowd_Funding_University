<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create user for admin
        $user = User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'created_at' => now(),
        ]);

        // Create admin profile
        Admin::create([
            'user_id' => $user->id,
            'name' => 'Admin CEO',
            'email' => 'admin@crowdfund.com',
            'phone_number' => '081234567890',
            'position' => 'CEO',
            'created_at' => now(),
        ]);
    }
}
