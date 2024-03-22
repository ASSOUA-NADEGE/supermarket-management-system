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
         $permission = collect([
            'view_dashboard',
            'view_users',
            'view_categories',
            'view_products',
            'view_orders',
            'view_reports',
            'view_settings',
            'create_users',
            'assign_roles',
            'create_categories',
            'update_categories',
            'delete_categories',
            'create_products',
            'update_products',
            'delete_products',
            'create_orders',
            'update_orders',
            'delete_orders',
        ]);

         $permission->each(function ($permission) {
            Permission::create(['name' => $permission]);
        });
    }
}
