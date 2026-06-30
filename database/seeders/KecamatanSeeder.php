<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatans = [
            ['Liukang Tangaya', '7309010'],
            ['Liukang Kalmas', '7309020'],
            ['Liukang Tupabbiring', '7309030'],
            ['Liukang Tupabbiring Utara', '7309031'],
            ['Pangkajene', '7309040'],
            ['Minasatene', '7309041'],
            ['Balocci', '7309050'],
            ['Tondong Tallasa', '7309051'],
            ['Bungoro', '7309060'],
            ['Labakkang', '7309070'],
            ["Ma'rang", '7309080'],
            ['Segeri', '7309091'],
            ['Mandalle', '7309092'],
        ];

        foreach ($kecamatans as [$nama, $kode]) {
            DB::table('kecamatans')->insert([
                'nama_kecamatan' => $nama,
                'kode_kecamatan' => $kode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}