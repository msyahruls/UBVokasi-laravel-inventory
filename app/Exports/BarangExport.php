<?php

namespace App\Exports;

use App\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class BarangExport implements FromCollection
// {
//     *
//     * @return \Illuminate\Support\Collection
    
//     public function collection()
//     {
//         return Barang::all();
//     }

// }

class BarangExport implements FromView
{
    public function view(): View
    {
        return view('exports.barang', [
        	'i'		=> 0,
            'data' 	=> Barang::all()
        ]);
    }
}

