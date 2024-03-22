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
                ['name' => 'minister', 'password' => '!password', 'email' => 'mundestephane13@gmail.com'],
                ['name' => 'pagouel', 'password' => 'johntheboss', 'email' => 'johnthbss@gmail.com']
            ],
            'vendor' => [
                ['name' => 'nadege', 'password' => 'assoua']
            ]
        ])->each(function ($users, $role) {
            User::factory()
                ->afterCreating(fn (User $user) => $user->assignRole($role))
                ->createMany($users);
        });
    }
}
