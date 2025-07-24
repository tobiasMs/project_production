<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;  // Tambahkan ini
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;  // Jangan lupa

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::create([
        'no_scan' => 'EMP001',
        'name' => 'admin',
        'full_name' => 'Administrator System',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'dept' => 'IT',
        'jabatan' => 'System Administrator',
        'status_active' => true,
        'profile' => 'profiles/admin.jpg'
    ]);
    $admin->assignRole('administrator');

    $supervisor = User::create([
        'no_scan' => 'EMP002',
        'name' => 'sup_prod',
        'full_name' => 'Supervisor Produksi',
        'email' => 'supervisor@example.com',
        'password' => bcrypt('password'),
        'dept' => 'Produksi',
        'jabatan' => 'Supervisor',
        'status_active' => true
    ]);
    $supervisor->assignRole('supervisor');

    }
}
