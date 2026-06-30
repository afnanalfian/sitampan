<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TanahSeeder extends Seeder
{
    public function run()
    {
        // Ambil data referensi
        $bidang = DB::table('bidangs')->first();
        $unitOrganisasi = DB::table('unit_organisasis')->first();
        $subUnitOrganisasi = DB::table('sub_unit_organisasis')->first();
        $kelurahan = DB::table('kelurahans')->first();
        $hak = DB::table('haks')->first();
        $penggunaan = DB::table('penggunaans')->first();
        $asalUsul = DB::table('asal_usuls')->first();
        $user = DB::table('users')->first();

        // Data tanah contoh
        $tanahs = [
            [
                'no_kode_wilayah' => '73.09.04.1001',
                'nama_barang' => 'Kantor Bupati Pangkajene',
                'nomor_kode_barang_1_3' => '1.3.01.01',
                'nomor_registrasi' => 'REG-001-2024',
                'luas' => 2500.00,
                'tahun_pengadaan' => 2010,
                'letak_alamat' => 'Jl. Jenderal Sudirman No. 1, Pangkajene',
                'tanggal_sertifikat' => '2010-01-15',
                'nomor_sertifikat' => 'SHM-001/Pangkajene/2010',
                'harga' => 1250000000.00,
                'latitude' => -4.79123456,
                'longitude' => 119.51234567,
                'keterangan' => 'Kantor Bupati dengan luas 2500 m2',
                'bidang_id' => $bidang->id,
                'unit_organisasi_id' => $unitOrganisasi->id,
                'sub_unit_organisasi_id' => $subUnitOrganisasi->id,
                'kelurahan_id' => $kelurahan->id,
                'hak_id' => $hak->id,
                'penggunaan_id' => $penggunaan->id,
                'asal_usul_id' => $asalUsul->id,
                'pengurus_barang_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_kode_wilayah' => '73.09.04.1002',
                'nama_barang' => 'Gedung DPRD Pangkajene',
                'nomor_kode_barang_1_3' => '1.3.01.02',
                'nomor_registrasi' => 'REG-002-2024',
                'luas' => 1800.00,
                'tahun_pengadaan' => 2012,
                'letak_alamat' => 'Jl. Pahlawan No. 5, Pangkajene',
                'tanggal_sertifikat' => '2012-03-20',
                'nomor_sertifikat' => 'SHM-002/Pangkajene/2012',
                'harga' => 850000000.00,
                'latitude' => -4.79234567,
                'longitude' => 119.51345678,
                'keterangan' => 'Gedung DPRD Kabupaten Pangkajene',
                'bidang_id' => $bidang->id,
                'unit_organisasi_id' => $unitOrganisasi->id,
                'sub_unit_organisasi_id' => $subUnitOrganisasi->id,
                'kelurahan_id' => $kelurahan->id,
                'hak_id' => $hak->id,
                'penggunaan_id' => $penggunaan->id,
                'asal_usul_id' => $asalUsul->id,
                'pengurus_barang_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tanahs')->insert($tanahs);
    }
}