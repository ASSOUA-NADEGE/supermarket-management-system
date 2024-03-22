<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);

        $admin = Role::where('name', 'admin')->first();
        $vendor = Role::where('name', 'vendor')->first();

        $minister = User::factory()->create([
            "name" => "minister",
            "password" => bcrypt('minister')
        ]);
        $johntheboss = User::factory()->create([
            "name" => "johntheboss",
            "password" => bcrypt('johntheboss')
        ]);

        $nadege = User::factory()->create([
            "name" => "nadege",
            "password" => bcrypt('nadege')
        ]);

        $minister->assignRole($admin);
        $johntheboss->assignRole($admin);
        $nadege->assignRole($vendor);

    }
}
