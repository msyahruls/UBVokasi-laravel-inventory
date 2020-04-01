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
            'R203',
            'R204',
            'R205',
            'R206',
            'R207',
            'R208',
            'R209',
            'R303',
            'R304',
            'R305',
            'R306',
            'R307',
            'R308',
            'R309',
        ];

        foreach ($listRuangan as $ruangan) {
        	Ruangan::create(['name' => $ruangan]);
        }
    }
}
