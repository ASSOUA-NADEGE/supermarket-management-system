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
        $roles = collect([
            'admin',
            'vendor',
        ]);

        $roles->each(function ($role) {
            Role::create(['name' => $role]);
        });


        $admin = Role::where('name', 'admin')->first();
        $vendor = Role::where('name', 'vendor')->first();
        $admin->givePermissionTo(Permission::all());
        $vendor->givePermissionTo(['view_dashboard', 'view_orders', 'view_reports', 'view_settings', 'view_categories', 'view_products']);
    }
}
