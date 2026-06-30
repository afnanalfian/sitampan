<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOrganisasiSeeder extends Seeder
{
    public function run()
    {
        // Mapping bidang_id (pastikan sudah di-run sebelumnya)
        $bidangIds = DB::table('bidangs')->pluck('id', 'nama_bidang');
        
        $unitOrganisasis = [
            ['Sekretariat Daerah', 'Sekretariat'],
            ['Sekretariat DPRD', 'Sekretariat'],
            ['Inspektorat', 'Sekretariat'],
            ['Badan Perencanaan Pembangunan Daerah (Bappeda/Bapperida)', 'Perencanaan'],
            ['Badan Keuangan dan Aset Daerah (BKAD/BPKAD)', 'Keuangan'],
            ['Badan Kepegawaian dan Pengembangan SDM (BKPSDM)', 'Kepegawaian'],
            ['Badan Pendapatan Daerah (Bapenda)', 'Keuangan'],
            ['Badan Kesatuan Bangsa dan Politik (Kesbangpol)', 'Pemerintahan'],
            ['Dinas Pendidikan', 'Pendidikan'],
            ['Dinas Kesehatan', 'Kesehatan'],
            ['Dinas Pertanian', 'Pertanian'],
            ['Dinas Perikanan', 'Perikanan'],
            ['Dinas Kelautan', 'Kelautan'],
            ['Dinas Perkebunan', 'Perkebunan'],
            ['Dinas Peternakan', 'Peternakan'],
            ['Dinas Pekerjaan Umum dan Penataan Ruang (PUPR)', 'Pekerjaan Umum'],
            ['Dinas Perhubungan', 'Perhubungan'],
            ['Dinas Sosial', 'Sosial'],
            ['Dinas Lingkungan Hidup', 'Lingkungan Hidup'],
            ['Dinas Komunikasi dan Informatika', 'Komunikasi dan Informatika'],
            ['Dinas Kependudukan dan Pencatatan Sipil', 'Kependudukan dan Pencatatan Sipil'],
            ['Dinas Perdagangan', 'Perdagangan'],
            ['Dinas Perindustrian', 'Perindustrian'],
            ['Dinas Pariwisata', 'Pariwisata'],
            ['Dinas Koperasi, UKM dan Tenaga Kerja', 'Koperasi dan UMKM'],
            ['Dinas Pemadam Kebakaran', 'Lainnya'],
            ['Kecamatan', 'Pemerintahan'],
            ['Kelurahan/Desa', 'Pemerintahan'],
            ['Rumah Sakit Umum Daerah (RSUD)', 'Kesehatan'],
            ['Puskesmas', 'Kesehatan'],
            ['Lainnya', 'Lainnya'],
        ];

        foreach ($unitOrganisasis as [$nama, $bidang]) {
            DB::table('unit_organisasis')->insert([
                'bidang_id' => $bidangIds[$bidang],
                'nama_unit_organisasi' => $nama,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}