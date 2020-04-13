<?php

namespace App\Http\Controllers;

use App\Ruangan;
use App\Jurusan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $data = Ruangan::when($request->search, function($query) use($request){
            $query->where('jurusan.name', 'LIKE', '%'.$request->search.'%');})
            ->join('jurusan', 'jurusan.id', '=', 'ruangan.jurusan_id')
            ->select('jurusan.name AS jurusan_name', 'ruangan.*')
            ->orderBy('jurusan.name','asc')
            ->orderBy('ruangan.name','asc')->
            ->with('jurusan')->paginate(10); 

        return view('ruangan.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Jurusan::all();
        return view('ruangan.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jurusan_id' => 'required'
        ]);

        Ruangan::create($request->all());
   
        return redirect()->route('ruangan.index')
                        ->with('success','Ruangan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ruangan::find($id);
        $jurusan = Jurusan::all();
        return view('ruangan.edit',compact('data','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'name'      =>  $request->name,
            'jurusan_id'  =>  $request->jurusan_id
        );

        Ruangan::whereId($id)->update($form_data);
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ruangan::whereId($id)->delete();

        return redirect()->route('ruangan.index');
    }
}
