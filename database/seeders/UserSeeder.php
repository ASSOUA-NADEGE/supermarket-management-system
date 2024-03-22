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
                ['name' => 'minister', 'password' => '!password'],
                ['name' => 'pagouel', 'password' => 'johntheboss']
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
