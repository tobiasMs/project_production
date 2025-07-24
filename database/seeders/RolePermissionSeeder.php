<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;  // Tambahkan ini
use Spatie\Permission\Models\Role;      // Dan ini

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // Buat permissions
    $permissions = [
        'view dashboard',
        'view production charts',
        'view machine charts',
        'input production data',
        'edit production data',
        'approve production documents',
        'manage users',
        'manage roles',
        'manage departments'
    ];

    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }

    // Buat roles dan assign permissions
    $adminRole = Role::create(['name' => 'administrator']);
    $adminRole->givePermissionTo(Permission::all());

    $umumRole = Role::create(['name' => 'umum']);
    $umumRole->givePermissionTo(['view dashboard', 'view production charts', 'view machine charts']);

    $supervisorRole = Role::create(['name' => 'supervisor']);
    $supervisorRole->givePermissionTo([
        'view dashboard',
        'approve production documents',
        'input production data'
    ]);

    $managerRole = Role::create(['name' => 'manager']);
    $managerRole->givePermissionTo([
        'view dashboard',
        'approve production documents',
        'edit production data'
    ]);

    $adminInputRole = Role::create(['name' => 'admin']);
    $adminInputRole->givePermissionTo([
        'view dashboard',
        'input production data'
    ]);
    }
}
