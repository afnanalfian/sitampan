<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsalUsulSeeder extends Seeder
{
    public function run()
    {
        $asalUsuls = [
            'Pembelian',
            'Hibah',
            'Tukar Menukar',
            'Penyertaan Modal',
            'Pelaksanaan Perjanjian/Kontrak',
            'Putusan Pengadilan',
            'Pengadaan',
            'Rampasan',
            'Donasi',
            'Warisan',
            'Swakelola',
            'Pembangunan',
            'Reklasifikasi Aset',
            'Transfer Masuk',
            'Pemekaran Wilayah',
            'Penyerahan dari Pemerintah Pusat',
            'Penyerahan dari Pemerintah Provinsi',
            'Penyerahan dari Pemerintah Kabupaten/Kota',
            'Lainnya'
        ];

        foreach ($asalUsuls as $asalUsul) {
            DB::table('asal_usuls')->insert([
                'nama_asal_usul' => $asalUsul,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
