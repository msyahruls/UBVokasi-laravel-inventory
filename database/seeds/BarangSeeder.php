<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = [
            'Meja',
            'Kursi',
            'Papan',
            'LCD',
            'Terminal',
        ];

        foreach ($listBarang as $barang) {
        	Barang::create(['name' => $barang]);
        }
    }
}
