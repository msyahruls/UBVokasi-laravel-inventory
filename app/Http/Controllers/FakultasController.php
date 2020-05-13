<?php

namespace App\Http\Controllers;

use App\Fakultas;
use App\Http\Controllers\Controller;
use App\Exports\FakultasExport;
use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class FakultasController extends Controller
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
        $data = Fakultas::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->orderBy('name','asc')->paginate(10); 

        return view('fakultas.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
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
        ]);
  
        Fakultas::create($request->all());
        return redirect()->route('fakultas.index')
                        ->with('success','Fakultas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fakultas::find($id);
        return view('fakultas.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Fakultas::whereId($id)->update(['name' => $request->name]);
        return redirect()->route('fakultas.index')
            ->with('success','Fakultas created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fakultas::whereId($id)->delete();
        return redirect()->route('fakultas.index')
            ->with('success','Fakultas deleted successfully.');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $filename = rand().$file->getClientOriginalName();
        $file->move('excel/fakultas',$filename);
        Excel::import(new FakultasImport, public_path('/excel/fakultas/'.$filename));
        return redirect()->route('fakultas.index')
            ->with('success','Fakultas imported successfully.');
    }

    public function export()
    {
        return Excel::download(new FakultasExport, 'fakultas-'.date("Y-m-d").'.xlsx');
    }
}
