<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'Admin User',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('12345678'),
                    'phone' => '9999999',
                    'status' => 1,
                ],
                [
                    'name' => 'Test User',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('12345678'),
                    'phone' => '9988511',
                    'status' => 1,
                ],
            ]
        );
    }
}
