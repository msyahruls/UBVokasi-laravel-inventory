<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use App\Barang;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fak = Fakultas::count();
        $jur = Jurusan::count();
        $rua = Ruangan::count();
        $bar = Barang::count();
        $tot = Barang::sum('total');
        $brk = Barang::sum('broken');
        
        $data = Barang::when($request->search, function($query) use($request){
            $query->where('barang_name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('ruangan_name', 'LIKE', "%{$request->search}%")
                ->orWhere('jurusan_name', 'LIKE', "%{$request->search}%")
                ->orWhere('fakultas_name', 'LIKE', "%{$request->search}%");
        })
        ->join('ruangan', 'ruangan.id', '=', 'barang.ruangan_id')
        ->join('jurusan', 'jurusan.id', '=', 'ruangan.jurusan_id')
        ->join('fakultas', 'fakultas.id', '=', 'jurusan.fakultas_id')
        ->select('ruangan.name AS ruangan_name', 
                'jurusan.name AS jurusan_name',
                'fakultas.name AS fakultas_name',
                'barang.name AS barang_name',
                'barang.*'
        )
        ->orderBy('fakultas_name','asc')
        ->orderBy('jurusan_name','asc')
        ->orderBy('ruangan_name','asc')
        ->orderBy('barang_name','asc')
        ->with('ruangan','create_by','update_by')->paginate(25);

        return view('welcome', compact('fak','jur','rua','bar','tot','brk','data'))
        	->with('i', (request()->input('page', 1) - 1) * 25);
    }
}
