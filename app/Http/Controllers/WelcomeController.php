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
        
        $data = Barang::when($request->search, function($query) use($request){
            $query->where('ruangan.name', 'LIKE', '%'.$request->search.'%');
        })
        ->join('ruangan', 'ruangan.id', '=', 'barang.ruangan_id')
        ->join('jurusan', 'jurusan.id', '=', 'ruangan.jurusan_id')
        ->join('fakultas', 'fakultas.id', '=', 'jurusan.fakultas_id')
        ->select('ruangan.name AS ruangan_name', 'jurusan.name AS jurusan_name', 'fakultas.name AS fakultas_name', 'barang.*')
        ->orderBy('fakultas.name','asc')
        ->orderBy('jurusan.name','asc')
        ->orderBy('ruangan.name','asc')
        ->orderBy('barang.name','asc')
        ->with('ruangan','create_by','update_by')->paginate(25);

        return view('welcome', compact('fak','jur','rua','bar','data'))
        	->with('i', (request()->input('page', 1) - 1) * 25);
    }
}
