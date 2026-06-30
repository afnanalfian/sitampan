<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $kecamatanIds = DB::table('kecamatans')->pluck('id', 'kode_kecamatan');
        
        $kelurahans = [
            // Liukang Tangaya (7309010)
            ['7309010', 'Sabalana', '7309010001'],
            ['7309010', 'Balo Baloang', '7309010002'],
            ['7309010', 'Sabaru', '7309010003'],
            ['7309010', 'Sapuka', '7309010004'],
            ['7309010', 'Tampaang', '7309010005'],
            ['7309010', 'Sailus', '7309010006'],
            ['7309010', 'Satanger', '7309010007'],
            ['7309010', 'Kapoposan Bali', '7309010008'],
            ['7309010', 'Poleonro', '7309010009'],
            
            // Liukang Kalmas (7309020)
            ['7309020', 'Doang Doangan', '7309020001'],
            ['7309020', 'Dewakang', '7309020002'],
            ['7309020', 'Marasende', '7309020003'],
            ['7309020', 'Kanyurang', '7309020004'],
            ['7309020', 'Kalu-kalukuang', '7309020005'],
            ['7309020', 'Sabaru', '7309020006'],
            ['7309020', 'Pammantauan Masalima', '7309020007'],
            
            // Liukang Tupabbiring (7309030)
            ['7309030', 'Mattiro Deceng', '7309030001'],
            ['7309030', 'Mattiro Sompe', '7309030002'],
            ['7309030', 'Mattiro Bone', '7309030003'],
            ['7309030', 'Mattiro Dolangeng', '7309030004'],
            ['7309030', 'Mattiro Langi', '7309030012'],
            ['7309030', 'Mattiro Matae', '7309030013'],
            ['7309030', 'Mattiro Ujung', '7309030014'],
            ['7309030', 'Mattaro Adae', '7309030015'],
            ['7309030', 'Mattiro Bintang', '7309030016'],
            
            // Liukang Tupabbiring Utara (7309031)
            ['7309031', 'Mattiro Bulu', '7309031001'],
            ['7309031', 'Mattiro Labangeng', '7309031002'],
            ['7309031', 'Mattiro Uleng', '7309031003'],
            ['7309031', 'Mattiro Kanja', '7309031004'],
            ['7309031', 'Mattiro Baji', '7309031005'],
            ['7309031', 'Mattiro Bombang', '7309031006'],
            ['7309031', 'Mattiro Walie', '7309031007'],
            
            // Pangkajene (7309040)
            ['7309040', 'Sibatua', '7309040007'],
            ['7309040', 'Bonto Perak', '7309040008'],
            ['7309040', 'Anrong Appaka', '7309040009'],
            ['7309040', 'Tekolabbua', '7309040010'],
            ['7309040', 'Jagong', '7309040011'],
            ['7309040', 'Tumampua', '7309040012'],
            ['7309040', 'Paddoang Doangan', '7309040013'],
            ['7309040', 'Pabundukang', '7309040016'],
            ['7309040', 'Mappasaile', '7309040017'],
            
            // Minasatene (7309041)
            ['7309041', 'Bonto Langkasa', '7309041001'],
            ['7309041', 'Kabba', '7309041002'],
            ['7309041', 'Panaikang', '7309041003'],
            ['7309041', 'Bontokio', '7309041004'],
            ['7309041', 'Biraeng', '7309041005'],
            ['7309041', 'Minasatene', '7309041006'],
            ['7309041', 'Kalabbirang', '7309041007'],
            ['7309041', 'Bontoa', '7309041008'],
            
            // Balocci (7309050)
            ['7309050', 'Kassi', '7309050001'],
            ['7309050', 'Tonasa', '7309050002'],
            ['7309050', 'Balocci Baru', '7309050003'],
            ['7309050', 'Balleangin', '7309050004'],
            ['7309050', 'Tompo Bulu', '7309050005'],
            
            // Tondong Tallasa (7309051)
            ['7309051', 'Bulu Tellue', '7309051001'],
            ['7309051', 'Malaka', '7309051002'],
            ['7309051', 'Bantimurung', '7309051003'],
            ['7309051', 'Tondongkura', '7309051004'],
            ['7309051', 'Lanne', '7309051005'],
            ['7309051', 'Bonto Birao', '7309051006'],
            
            // Bungoro (7309060)
            ['7309060', 'Boriappaka', '7309060001'],
            ['7309060', 'Bulu Cindea', '7309060002'],
            ['7309060', 'Bowong Cindea', '7309060003'],
            ['7309060', 'Samalewa', '7309060004'],
            ['7309060', 'Sapanang', '7309060005'],
            ['7309060', 'Biring Ere', '7309060006'],
            ['7309060', 'Mangilu', '7309060007'],
            ['7309060', 'Tabo-tabo', '7309060009'],
            
            // Labakkang (7309070)
            ['7309070', 'Borimasunggu', '7309070001'],
            ['7309070', 'Mangallekana', '7309070002'],
            ['7309070', 'Batara', '7309070003'],
            ['7309070', 'Taraweang', '7309070004'],
            ['7309070', 'Bara Batu', '7309070005'],
            ['7309070', 'Kassi Loe', '7309070006'],
            ['7309070', 'Patallassang', '7309070007'],
            ['7309070', 'Labakkang', '7309070008'],
            ['7309070', 'Pundata Baji', '7309070009'],
            ['7309070', 'Bonto Manai', '7309070010'],
            ['7309070', 'Manakku', '7309070011'],
            ['7309070', 'Gentung', '7309070012'],
            ['7309070', 'Kanaungan', '7309070013'],
            
            // Ma'rang (7309080)
            ['7309080', 'Talaka', '7309080001'],
            ['7309080', 'Attang Salo', '7309080002'],
            ['7309080', 'Padang Lampe', '7309080003'],
            ['7309080', 'Alesipitto', '7309080004'],
            ['7309080', "Ma'rang", '7309080005'],
            ['7309080', 'Bonto-bonto', '7309080006'],
            ['7309080', 'Pitue', '7309080007'],
            ['7309080', 'Pitu Sunggu', '7309080008'],
            ['7309080', 'Tamangapa', '7309080009'],
            ['7309080', 'Punranga', '7309080010'],
            
            // Segeri (7309091)
            ['7309091', 'Bonto Matene', '7309091001'],
            ['7309091', 'Baring', '7309091002'],
            ['7309091', 'Parenreng', '7309091003'],
            ['7309091', 'Segeri', '7309091004'],
            ['7309091', 'Bawasalo', '7309091005'],
            ['7309091', 'Bone', '7309091006'],
            
            // Mandalle (7309092)
            ['7309092', 'Benteng', '7309092001'],
            ['7309092', 'Manggalung', '7309092002'],
            ['7309092', 'Boddie', '7309092003'],
            ['7309092', 'Tamarupa', '7309092004'],
            ['7309092', 'Coppo Tompong', '7309092005'],
            ['7309092', 'Mandalle', '7309092006'],
        ];

        foreach ($kelurahans as [$kodeKec, $nama, $kodeKel]) {
            if (isset($kecamatanIds[$kodeKec])) {
                DB::table('kelurahans')->insert([
                    'kecamatan_id' => $kecamatanIds[$kodeKec],
                    'nama_kelurahan' => $nama,
                    'kode_kelurahan' => $kodeKel,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}