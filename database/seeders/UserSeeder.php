<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Admin
        User::updateOrCreate(
            ['email' => 'admin@wynestore.id'],
            [
                'name' => 'Wyne Workshop Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Admin+Wyne&background=F5D698&color=000000',
            ]
        );

        // Seed Regular Customer User
        User::updateOrCreate(
            ['email' => 'user@wynestore.id'],
            [
                'name' => 'Aditya Customer',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'avatar' => 'https://ui-avatars.com/api/?name=Aditya+Customer&background=1e2230&color=ffffff',
            ]
        );
    }
}
