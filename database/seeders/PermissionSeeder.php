<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'view-dashboard',
            'view-users',
            'view-categories',
            'view-products',
            'view-orders',
            'view-reports',
            'view-settings',
            'create-users',
            'assign-roles',
            'create-categories',
            'update-categories',
            'delete-categories',
            'create-products',
            'update-products',
            'delete-products',
            'create-orders',
            'update-orders',
            'delete-orders',
        ])->each(function ($permission) {
            Permission::create(['name' => $permission]);
        });
    }
}
