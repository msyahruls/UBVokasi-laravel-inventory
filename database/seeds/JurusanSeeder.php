
<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJurusan = [
            ['name' => 'Sarjana Akuntansi',                         'fakultas_id' => '1'],
            ['name' => 'Ekonomi Pembangunan',                       'fakultas_id' => '1'],
            ['name' => 'Manajemen',                                 'fakultas_id' => '1'],
            ['name' => 'Ekonomi Islam',                             'fakultas_id' => '1'],
            ['name' => 'Kewirausahaan',                             'fakultas_id' => '1'],
            ['name' => 'Ekonomi, Keuangan, dan Perbankan',          'fakultas_id' => '1'],

            ['name' => 'Ilmu Hukum',                                'fakultas_id' => '2'],

            ['name' => 'Ilmu Administrasi Publik',                  'fakultas_id' => '3'],
            ['name' => 'Ilmu Administrasi Bisnis',                  'fakultas_id' => '3'],
            ['name' => 'Perpajakan',                                'fakultas_id' => '3'],
            ['name' => 'Ilmu Perpustakaan',                         'fakultas_id' => '3'],
            ['name' => 'Pariwisata',                                'fakultas_id' => '3'],
            ['name' => 'Administrasi Pendidikan',                   'fakultas_id' => '3'],

            ['name' => 'Sastra Inggris',                            'fakultas_id' => '4'],
            ['name' => 'Sastra Jepang',                             'fakultas_id' => '4'],
            ['name' => 'Bahasa dan Sastra Perancis',                'fakultas_id' => '4'],
            ['name' => 'Sastra Cina',                               'fakultas_id' => '4'],
            ['name' => 'Pendidikan Bahasa dan Sastra Indonesia',    'fakultas_id' => '4'],
            ['name' => 'Pendidikan Bahasa Inggris',                 'fakultas_id' => '4'],
            ['name' => 'Pendidikan Bahasa Jepang',                  'fakultas_id' => '4'],
            ['name' => 'Seni Rupa Murni',                           'fakultas_id' => '4'],
            ['name' => 'Antropologi Sosial',                        'fakultas_id' => '4'],

            ['name' => 'Manajemen Sumberdaya Perairan',             'fakultas_id' => '5'],
            ['name' => 'Budidaya Perairan',                         'fakultas_id' => '5'],
            ['name' => 'Teknologi Hasil Perikanan',                 'fakultas_id' => '5'],
            ['name' => 'Pemanfaaatan Sumberdaya Perikanan',         'fakultas_id' => '5'],
            ['name' => 'Ilmu Kelautan',                             'fakultas_id' => '5'],
            ['name' => 'Agrobisnis Perikanan',                      'fakultas_id' => '5']
        ];

        foreach ($listJurusan as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}
