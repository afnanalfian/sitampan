<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HakSeeder extends Seeder
{
    public function run()
    {
        $haks = [
            'Hak Milik',
            'Hak Pakai',
            'Hak Guna Bangunan (HGB)',
            'Hak Guna Usaha (HGU)',
            'Hak Pengelolaan (HPL)',
            'Hak Sewa',
            'Hak Pengelolaan Lainnya'
        ];

        foreach ($haks as $hak) {
            DB::table('haks')->insert([
                'nama_hak' => $hak,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}