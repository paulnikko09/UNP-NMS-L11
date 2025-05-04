<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'unp_nms@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
            ]
        );
    }
}