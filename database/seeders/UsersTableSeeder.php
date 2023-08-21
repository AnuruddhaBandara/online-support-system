<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Anuruddha Bandara',
                'email' => 'anuruddha@testmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Nisala Nayanajith',
                'email' => 'nisala@testmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Kasun Kaushalya',
                'email' => 'kasun@testmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Akila Senaratne',
                'email' => 'akila@testmail.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
