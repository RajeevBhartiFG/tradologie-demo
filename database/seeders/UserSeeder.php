<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin@123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User-1',
            'email' => 'user1@example.com',
            'password' => Hash::make('user@123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'User-2',
            'email' => 'user2@example.com',
            'password' => Hash::make('user@123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Service-Provider1',
            'email' => 'service1@example.com',
            'password' => Hash::make('service@123'),
            'role' => 'provider',
        ]);

        User::create([
            'name' => 'Service-Provider-2',
            'email' => 'service2@example.com',
            'password' => Hash::make('service@123'),
            'role' => 'provider',
        ]);

        User::create([
            'name' => 'Service-Provider-3',
            'email' => 'service3@example.com',
            'password' => Hash::make('service@123'),
            'role' => 'provider',
        ]);
    }
}
