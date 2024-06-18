<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'admin' => [
                ['name' => 'nadege', 'password' => 'assoua']

            ],
            'vendor' => [
                ['name' => 'vendor1', 'password' => 'vendor1', 'email' => 'vendor1@gmail.com'],
                ['name' => 'vendor2', 'password' => 'vendor2', 'email' => 'vendor2@gmail.com']
            ]
        ])->each(function ($users, $role) {
            User::factory()
                ->afterCreating(fn (User $user) => $user->assignRole($role))
                ->createMany($users);
        });
    }
}
