<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jalan;

class jalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalan = Jalan::all();
        return view ('jalan.dataJalan', ['jalan' => $jalan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('jalan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $messages=[
        //     'nama.required' => 'Kolom nama harus diisi',
        //     'panjang.required' => 'Kolom nama harus diisi',
        //     'lebar.required' => 'Kolom nama harus diisi',
        //     'kondisi.required' => 'Pengguna harus memilih salah satu pilihan di kolom ini',
        //     'jenisPekerjaan.required' => 'Pengguna harus memilih salah satu pilihan di kolom ini',
        //     'luasKerusakan.required' => 'Kolom nama harus diisi',
        //     'tahunPembangunan.required' => 'Kolom nama harus diisi',     
        // ];
        $request->validate([
            'nama' => 'required|max:255',
            'panjang' => 'required',
            'lebar' => 'required',
            'kondisi' => 'required',
            'jenisPekerjaan' => 'required',
            'luasKerusakan' => 'required',
            'tahunPembangunan' => 'required|max:4',
        ]);
        
        Jalan::create($request->all());

        return redirect('/jalan')->with('status', 'Data Jalan Berhasil Ditambahkan!');
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
        $jalan = Jalan::find($id);
        return view ('jalan.edit', compact(['jalan']));
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
            'nama' => 'required|max:255',
            'panjang' => 'required|max:3',
            'lebar' => 'required|max:3',
            'kondisi' => 'required',
            'jenisPekerjaan' => 'required',
            'luasKerusakan' => 'required',
            'tahunPembangunan' => 'required|max:4',
        ]);
        $jalans = Jalan::find($id);
        $jalans->update($request->all());
        // Jalan::where('id', $request->id)
        //   ->update([
        //       'nama' => $request->nama,
        //       'panjang' => $request->panjang,
        //       'lebar' => $request->lebar,
        //       'jenisPekerjaan' => $request->jenisPekerjaan,
        //       'kondisi' => $request->kondisi,
        //       'luasKerusakan' => $request->luasKerusakan,
        //       'tahunPembangunan' => $request->tahunPembangunan,
        //   ]);
        return redirect('/jalan')->with('status', 'Data Jalan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jalan::destroy($id);
        return redirect('/jalan')->with('status', 'Data Jalan Berhasil Dihapus!');
    }
}
