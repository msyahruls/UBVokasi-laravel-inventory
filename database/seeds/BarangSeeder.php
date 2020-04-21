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
            ['name' => 'Meja',      'total' => '12',    'broken' => '1', 'ruangan_id' => '1', 'image' => 'Qobsf5H8UHAyMHT1qlD4tx6Uqt98IL3b.jpg', 'created_by' => '1', 'updated_by' => '2'],
            ['name' => 'Kursi',     'total' => '24',    'broken' => '2', 'ruangan_id' => '1', 'image' => '65bDcvt2IaDOZ2i0TutmQ7861gTQHz0A.jpg', 'created_by' => '1', 'updated_by' => '2'],
            ['name' => 'Papan',     'total' => '2',     'broken' => '0', 'ruangan_id' => '1', 'image' => 'PSjckyuFWrpbYzphMTZEjp7D3EQAzFWf.jpg', 'created_by' => '1', 'updated_by' => '1'],
            ['name' => 'LCD',       'total' => '1',     'broken' => '0', 'ruangan_id' => '1', 'image' => 'I6dAM47xHsVVSL4fNGIkzSWvIsiNLOQm.jpg', 'created_by' => '1', 'updated_by' => '1'],
            ['name' => 'Terminal',  'total' => '5',     'broken' => '2', 'ruangan_id' => '1', 'image' => 'ZNaQnCwJRudpVcSBegLw3v0wTkMrwkGk.jpg', 'created_by' => '1', 'updated_by' => '5'],

            ['name' => 'Meja',      'total' => '24',    'broken' => '4', 'ruangan_id' => '2', 'image' => 'Qobsf5H8UHAyMHT1qlD4tx6Uqt98IL3b.jpg', 'created_by' => '1', 'updated_by' => '1'],
            ['name' => 'Kursi',     'total' => '24',    'broken' => '1', 'ruangan_id' => '2', 'image' => '65bDcvt2IaDOZ2i0TutmQ7861gTQHz0A.jpg', 'created_by' => '1', 'updated_by' => '2'],
            ['name' => 'Papan',     'total' => '1',     'broken' => '0', 'ruangan_id' => '2', 'image' => 'PSjckyuFWrpbYzphMTZEjp7D3EQAzFWf.jpg', 'created_by' => '1', 'updated_by' => '3'],
            ['name' => 'LCD',       'total' => '1',     'broken' => '0', 'ruangan_id' => '2', 'image' => 'I6dAM47xHsVVSL4fNGIkzSWvIsiNLOQm.jpg', 'created_by' => '1', 'updated_by' => '1'],
            ['name' => 'Terminal',  'total' => '6',     'broken' => '0', 'ruangan_id' => '2', 'image' => 'ZNaQnCwJRudpVcSBegLw3v0wTkMrwkGk.jpg', 'created_by' => '1', 'updated_by' => '5'],

            ['name' => 'Meja',      'total' => '14',    'broken' => '0', 'ruangan_id' => '3', 'image' => 'Qobsf5H8UHAyMHT1qlD4tx6Uqt98IL3b.jpg', 'created_by' => '2', 'updated_by' => '2'],
            ['name' => 'Kursi',     'total' => '28',    'broken' => '0', 'ruangan_id' => '3', 'image' => '65bDcvt2IaDOZ2i0TutmQ7861gTQHz0A.jpg', 'created_by' => '2', 'updated_by' => '2'],
            ['name' => 'Papan',     'total' => '1',     'broken' => '1', 'ruangan_id' => '3', 'image' => 'PSjckyuFWrpbYzphMTZEjp7D3EQAzFWf.jpg', 'created_by' => '2', 'updated_by' => '1'],
            ['name' => 'LCD',       'total' => '1',     'broken' => '1', 'ruangan_id' => '3', 'image' => 'I6dAM47xHsVVSL4fNGIkzSWvIsiNLOQm.jpg', 'created_by' => '2', 'updated_by' => '4'],
            ['name' => 'Terminal',  'total' => '2',     'broken' => '0', 'ruangan_id' => '3', 'image' => 'ZNaQnCwJRudpVcSBegLw3v0wTkMrwkGk.jpg', 'created_by' => '2', 'updated_by' => '5'],

            ['name' => 'Meja',      'total' => '12',    'broken' => '2', 'ruangan_id' => '4', 'image' => 'Qobsf5H8UHAyMHT1qlD4tx6Uqt98IL3b.jpg', 'created_by' => '2', 'updated_by' => '1'],
            ['name' => 'Kursi',     'total' => '24',    'broken' => '2', 'ruangan_id' => '4', 'image' => '65bDcvt2IaDOZ2i0TutmQ7861gTQHz0A.jpg', 'created_by' => '2', 'updated_by' => '1'],
            ['name' => 'Papan',     'total' => '3',     'broken' => '2', 'ruangan_id' => '4', 'image' => 'PSjckyuFWrpbYzphMTZEjp7D3EQAzFWf.jpg', 'created_by' => '2', 'updated_by' => '1'],
            ['name' => 'LCD',       'total' => '1',     'broken' => '0', 'ruangan_id' => '4', 'image' => 'I6dAM47xHsVVSL4fNGIkzSWvIsiNLOQm.jpg', 'created_by' => '2', 'updated_by' => '1'],
            ['name' => 'Terminal',  'total' => '5',     'broken' => '2', 'ruangan_id' => '4', 'image' => 'ZNaQnCwJRudpVcSBegLw3v0wTkMrwkGk.jpg', 'created_by' => '2', 'updated_by' => '2'],

            ['name' => 'Meja',      'total' => '30',    'broken' => '1', 'ruangan_id' => '5', 'image' => 'Qobsf5H8UHAyMHT1qlD4tx6Uqt98IL3b.jpg', 'created_by' => '3', 'updated_by' => '5'],
            ['name' => 'Kursi',     'total' => '30',    'broken' => '2', 'ruangan_id' => '5', 'image' => '65bDcvt2IaDOZ2i0TutmQ7861gTQHz0A.jpg', 'created_by' => '3', 'updated_by' => '5'],
            ['name' => 'Papan',     'total' => '2',     'broken' => '0', 'ruangan_id' => '5', 'image' => 'PSjckyuFWrpbYzphMTZEjp7D3EQAzFWf.jpg', 'created_by' => '3', 'updated_by' => '5'],
            ['name' => 'LCD',       'total' => '1',     'broken' => '0', 'ruangan_id' => '5', 'image' => 'I6dAM47xHsVVSL4fNGIkzSWvIsiNLOQm.jpg', 'created_by' => '3', 'updated_by' => '5'],
            ['name' => 'Terminal',  'total' => '10',    'broken' => '3', 'ruangan_id' => '5', 'image' => 'ZNaQnCwJRudpVcSBegLw3v0wTkMrwkGk.jpg', 'created_by' => '3', 'updated_by' => '5']
        ];

        foreach ($listBarang as $barang) {
        	Barang::create($barang);
        }
    }
}
