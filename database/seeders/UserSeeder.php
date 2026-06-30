<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@sitampan.com',
            'password' => Hash::make('password123'),
            'nip_nipppk' => '198001012005011001',
            'jabatan' => 'Administrator',
            'status' => 'PNS',
            'nomor_telepon' => '081234567890',
        ]);
        $superAdmin->assignRole('Super Admin');

        // Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@sitampan.com',
            'password' => Hash::make('password123'),
            'nip_nipppk' => '198002022005011002',
            'jabatan' => 'Admin',
            'unit_organisasi_id' => 1, // Sesuaikan dengan ID Sekretariat Daerah
            'status' => 'PNS',
            'nomor_telepon' => '081234567891',
        ]);
        $admin->assignRole('Admin');

        // Pimpinan
        $pimpinan = User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@sitampan.com',
            'password' => Hash::make('password123'),
            'nip_nipppk' => '198003032005011003',
            'jabatan' => 'Kepala Dinas',
            'unit_organisasi_id' => 1, // Sesuaikan dengan ID Sekretariat Daerah
            'status' => 'PNS',
            'nomor_telepon' => '081234567892',
        ]);
        $pimpinan->assignRole('Pimpinan');

        // Contoh user tambahan
        $users = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@sitampan.com',
                'nip_nipppk' => '198004042005011004',
                'jabatan' => 'Kepala Bidang',
                'unit_organisasi_id' => 2, // Sesuaikan
                'status' => 'PNS',
                'nomor_telepon' => '081234567893',
                'role' => 'Admin'
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@sitampan.com',
                'nip_nipppk' => '198005052005011005',
                'jabatan' => 'Staf',
                'unit_organisasi_id' => 3, // Sesuaikan
                'status' => 'PPPK',
                'nomor_telepon' => '081234567894',
                'role' => 'Admin'
            ],
        ];

        foreach ($users as $userData) {
            $role = $userData['role'];
            unset($userData['role']);
            
            $user = User::create(array_merge($userData, [
                'password' => Hash::make('password123'),
            ]));
            $user->assignRole($role);
        }
    }
}