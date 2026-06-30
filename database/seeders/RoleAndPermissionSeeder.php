<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permissions untuk setiap resource
        $permissions = [
            // Permission untuk Tanah
            'view_tanahs', 'create_tanahs', 'edit_tanahs', 'delete_tanahs',
            // Permission untuk User
            'view_users', 'create_users', 'edit_users', 'delete_users',
            // Permission untuk Master Data
            'view_master_data', 'create_master_data', 'edit_master_data', 'delete_master_data',
            // Permission untuk Laporan
            'view_laporan', 'export_laporan',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Buat roles
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $pimpinan = Role::create(['name' => 'Pimpinan']);

        // Assign permissions ke roles
        $superAdmin->givePermissionTo(Permission::all());
        
        $admin->givePermissionTo([
            'view_tanahs', 'create_tanahs', 'edit_tanahs', 'delete_tanahs',
            'view_users', 'create_users', 'edit_users',
            'view_master_data', 'create_master_data', 'edit_master_data',
            'view_laporan', 'export_laporan',
        ]);

        $pimpinan->givePermissionTo([
            'view_tanahs',
            'view_laporan', 'export_laporan',
        ]);
    }
}