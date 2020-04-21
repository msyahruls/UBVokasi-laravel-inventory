<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Ruangan;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use File;

class BarangController extends Controller
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
        $data = Barang::when($request->search, function($query) use($request){
            $query->where('ruangan.name', 'LIKE', '%'.$request->search.'%');})
            ->join('ruangan', 'ruangan.id', '=', 'barang.ruangan_id')
            ->select('ruangan.name AS ruangan_name', 'barang.*')
            ->orderBy('ruangan.name','asc')
            ->orderBy('barang.name','asc')
            ->with('ruangan','create_by','update_by')->paginate(10);

        return view('barang.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ruangan::all();
        return view('barang.create',compact('data'));
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
            'ruangan_id'=> 'required',
            'name'      => 'required',
            'total'     => 'required|numeric',
            'broken'    => 'required|numeric',
            'image'     => 'required|image|max:2048',
            'created_by'=> 'required',
            'updated_by'=> 'required'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/barang'), $new_name);

        $form_data = array(
            'ruangan_id'=> $request->ruangan_id,
            'name'      => $request->name,
            'total'     => $request->total,
            'broken'    => $request->broken,
            'image'     => $new_name,
            'created_by'=> $request->created_by,
            'updated_by'=> $request->updated_by
        );

        // Barang::create($request->all());
        Barang::create($form_data);
   
        return redirect()->route('barang.index')
                        ->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::find($id);
        $ruangan = Ruangan::all();
        return view('barang.edit',compact('data','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image\barang');
        if($image != ''){
            $request->validate([
                'ruangan_id'=> 'required',
                'name'      => 'required',
                'total'     => 'required|numeric',
                'broken'    => 'required|numeric',
                'image'     => 'required|image|max:2048',
                'updated_by'=> 'required'
            ]);

            $image_path = "images/barang/".$image_name;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/barang'), $image_name);
        }else{
            $request->validate([
                'ruangan_id'=> 'required',
                'name'      => 'required',
                'total'     => 'required|numeric',
                'broken'    => 'required|numeric',
                'updated_by'=> 'required'
            ]);
        }

        $form_data = array(
            'name'          =>  $request->name,
            'ruangan_id'    =>  $request->ruangan_id,
            'total'         =>  $request->total,
            'broken'        =>  $request->broken,
            'updated_by'    =>  $request->updated_by
        );

        Barang::whereId($id)->update($form_data);
        return redirect()->route('barang.index')
            ->with('success','Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $image_path = "images/".$barang->image;  // Value is not URL but directory file path
        print($image_path);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $barang->delete();
        // Barang::whereId($id)->delete();
        return redirect()->route('barang.index')
            ->with('success','Barang deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'barang-'.date("Y-m-d").'.xlsx');
    }
}
