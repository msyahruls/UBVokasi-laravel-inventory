<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = [
            'Ekonomi Bisnis',
            'Hukum',
            'Ilmu Administrasi',
            'Ilmu Budaya',
            'Ilmu Kelautan',
            'Ilmu Komputer',
            'Ilmu Sosial dan Ilmu Politik',
            'Kedokteran',
            'Matematika dan Ilmu Pengetahuan Alam',
            'Pendidikan Vokasi',
            'Pertanian',
            'Peternakan',
            'Teknik',
            'Teknologi Pertanian'
        ];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['name' => $fakultas]);
        }
    }
}
