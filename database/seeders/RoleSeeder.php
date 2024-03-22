<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'admin' => Permission::all(),
            'vendor' => [
                'view-dashboard',
                'view-orders',
                'view-reports',
                'view-settings',
                'view-categories',
                'view-products'
            ],
        ])->each(function ($permissions, $role) {
            try {
                Role::create(['name' => $role])?->givePermissionTo($permissions);
            } catch (\Exception $e) {
                dump("Error: Creating Role: ", $e->getMessage());
            }
        });
    }
}
