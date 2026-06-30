<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaanSeeder extends Seeder
{
    public function run()
    {
        $penggunaans = [
            'Perkantoran',
            'Sekolah',
            'Rumah Dinas',
            'Puskesmas',
            'Rumah Sakit',
            'Gudang',
            'Jalan',
            'Taman',
            'Lapangan',
            'Tempat Pemakaman Umum (TPU)',
            'Pertanian',
            'Perkebunan',
            'Peternakan',
            'Kawasan Agribisnis',
            'Irigasi',
            'Pasar',
            'Terminal',
            'Pelabuhan',
            'Bandara',
            'Fasilitas Umum',
            'Ruang Terbuka Hijau (RTH)',
            'Lainnya (sesuai fungsi tanah)'
        ];

        foreach ($penggunaans as $penggunaan) {
            DB::table('penggunaans')->insert([
                'nama_penggunaan' => $penggunaan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}