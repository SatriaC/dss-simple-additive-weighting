<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact(['kriteria']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kriteria.create');
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
            'nama'=> 'required',
            'jenis'=> 'required',
            'bobot'=> 'required',
        ]);
        Kriteria::create($request->all());

        return redirect('/kriteria')->with('status', 'Kriteria Berhasil Dibuat!');
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
        $kriteria = Kriteria::find($id);
        return view ('kriteria.edit', compact(['kriteria']));
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
            'nama'=> 'required',
            'jenis'=> 'required',
            'bobot'=> 'required',
        ]);
        
        $kriterias = Kriteria::find($id);
        $kriterias->update($request->all());
        // Kriteria::where('id', $request->id)
        // ->update([
        //     'nama'=> $request->nama,
        //     'jenis'=> $request->jenis,
        //     'bobot'=> $request->bobot,
        // ]);

        return redirect('/kriteria')->with('status', 'Kriteria Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect('/kriteria')->with('status', 'Kriteria Berhasil Dihapus!');
    }
}
