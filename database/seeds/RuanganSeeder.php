<?php

use Illuminate\Database\Seeder;
use App\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = [
            ['name' => 'R101',          'jurusan_id' => '1'],
            ['name' => 'R102',          'jurusan_id' => '1'],
            ['name' => 'R103',          'jurusan_id' => '1'],

            ['name' => 'R201',          'jurusan_id' => '2'],
            ['name' => 'R202',          'jurusan_id' => '2'],
            ['name' => 'R203',          'jurusan_id' => '2'],

            ['name' => 'R Praktek 1',   'jurusan_id' => '3'],
            ['name' => 'R Teori 2',     'jurusan_id' => '3'],
            ['name' => 'R Teori 3',     'jurusan_id' => '3'],

            ['name' => 'R501',          'jurusan_id' => '4'],
            ['name' => 'R502',          'jurusan_id' => '4'],

            ['name' => 'R Lab',         'jurusan_id' => '5'],
            ['name' => 'R Teori',       'jurusan_id' => '5'],
            ['name' => 'R Gudang',      'jurusan_id' => '5'],

            ['name' => 'R67',           'jurusan_id' => '6'],
            ['name' => 'R68',           'jurusan_id' => '6'],
            ['name' => 'R69',           'jurusan_id' => '6']

        ];

        foreach ($listRuangan as $ruangan) {
        	Ruangan::create($ruangan);
        }
    }
}
