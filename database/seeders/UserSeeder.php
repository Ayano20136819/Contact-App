<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedUsers = [
            [
                'name' => 'Admin Istrator',
                'email' => 'admin@example.com',
                'password' => 'Password1'

            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => 'Dummy User',
                'email' => 'dummy@example.com',
                'password' => 'Password1'
            ]
        ];

        foreach ($seedUsers as $seedUser) {
            User::updateOrCreate($seedUser);
        }

        // create 6 more random users using a factory
        User::factory()->count(6)->create();


    }
}
