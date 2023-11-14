<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = array(
            'Politik Pemerintahan' => [
                'Politik Indonesia Terapan',
                'Studi Kebijakan Publik',
                'Pembangunan Ekonomi Dan Pemberdayaan'
            ],

            'Manajemen Pemerintahan' => [
                'Administrasi Pemerintahan Daerah',
                'Msdm Sektor Publik',
                'Keuangan Publik',
                'Teknologi Rekayasa Ilmu Pemerintahan'
            ],

            'Perlindungan Masyarakat' => [
                'Praktik Perpolisian Tata Pamong',
                'Kependudukan Dan Catatan Sipil ',
                'Manajemen Keamanan Dan Keselamatan Publik',
            ],
            );

         foreach ($dataArray as $fakultas => $prodi) {
            $fakultas = Fakultas::create([
                'name' => $fakultas
            ]);

            if ($fakultas) {
                foreach ($prodi as $key => $prodi) {
                Prodi::create([
                    'fakultas_id' => $fakultas->id,
                    'name' => $prodi
                ]);
                }
            }
        }
    }
}