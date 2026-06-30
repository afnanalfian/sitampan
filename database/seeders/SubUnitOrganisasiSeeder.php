<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubUnitOrganisasiSeeder extends Seeder
{
    public function run()
    {
        $unitIds = DB::table('unit_organisasis')->pluck('id', 'nama_unit_organisasi');
        
        $subUnits = [
            ['Sekretariat Daerah', 'Sekretariat'],
            ['Sekretariat Daerah', 'Bidang Perencanaan'],
            ['Sekretariat Daerah', 'Bidang Keuangan'],
            ['Sekretariat Daerah', 'Bidang Aset'],
            ['Dinas Pertanian', 'Bidang Tanaman Pangan'],
            ['Dinas Pertanian', 'Bidang Hortikultura'],
            ['Dinas Perkebunan', 'Bidang Perkebunan'],
            ['Dinas Peternakan', 'Bidang Peternakan'],
            ['Dinas Perikanan', 'Bidang Perikanan Tangkap'],
            ['Dinas Perikanan', 'Bidang Budidaya'],
            ['Dinas Pekerjaan Umum dan Penataan Ruang (PUPR)', 'Bidang Bina Marga'],
            ['Dinas Pekerjaan Umum dan Penataan Ruang (PUPR)', 'Bidang Cipta Karya'],
            ['Dinas Pekerjaan Umum dan Penataan Ruang (PUPR)', 'Bidang Tata Ruang'],
            ['Dinas Kesehatan', 'Bidang Kesehatan Masyarakat'],
            ['Dinas Kesehatan', 'Bidang Pelayanan Kesehatan'],
            ['Dinas Pendidikan', 'Bidang Pembinaan SD'],
            ['Dinas Pendidikan', 'Bidang Pembinaan SMP'],
        ];

        foreach ($subUnits as [$unit, $subUnit]) {
            if (isset($unitIds[$unit])) {
                DB::table('sub_unit_organisasis')->insert([
                    'unit_organisasi_id' => $unitIds[$unit],
                    'nama_sub_unit_organisasi' => $subUnit,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}