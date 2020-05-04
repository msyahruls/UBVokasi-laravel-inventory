<?php

namespace App\Exports;

use App\Ruangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RuanganExport implements FromView
{
    public function view(): View
    {
        return view('exports.ruangan', [
        	'i'		=> 0,
            'data' 	=> Ruangan::all()
        ]);
    }
}
