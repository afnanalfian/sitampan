<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $bidangs = [
            'Sekretariat',
            'Perencanaan',
            'Keuangan',
            'Kepegawaian',
            'Pemerintahan',
            'Pendidikan',
            'Kesehatan',
            'Pertanian',
            'Perkebunan',
            'Peternakan',
            'Perikanan',
            'Kelautan',
            'Kehutanan',
            'Perdagangan',
            'Perindustrian',
            'Koperasi dan UMKM',
            'Pariwisata',
            'Pekerjaan Umum',
            'Perumahan dan Permukiman',
            'Lingkungan Hidup',
            'Perhubungan',
            'Komunikasi dan Informatika',
            'Kependudukan dan Pencatatan Sipil',
            'Sosial',
            'Ketahanan Pangan',
            'Penanaman Modal',
            'Kebudayaan',
            'Pemuda dan Olahraga',
            'Perpustakaan',
            'Kearsipan',
            'Penanggulangan Bencana',
            'Satuan Polisi Pamong Praja',
            'Lainnya'
        ];

        foreach ($bidangs as $bidang) {
            DB::table('bidangs')->insert([
                'nama_bidang' => $bidang,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}