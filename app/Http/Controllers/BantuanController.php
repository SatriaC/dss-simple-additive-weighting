<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bantuan;

class BantuanController extends Controller
{
    public function index()
    {
        $bantuan = Bantuan::all();
        return view ('bantuan.index', ['bantuan'=>$bantuan]);
    }
    public function create()
    {

        return view ('bantuan.create');
    }
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
            'judulIsi' => 'required|max:255',
            'isiBantuan' => 'required',
        ]);
        
        Bantuan::create($request->all());

        return redirect('/bantuan')->with('status', 'Data Bantuan Berhasil Ditambahkan!');
    }
    public function show($id)
    {
        $bantuan = Bantuan::find($id);
        return view ('bantuan.show', compact(['bantuan']));
    }
    public function edit($id)
    {
        $bantuan = Bantuan::find($id);
        return view ('bantuan.edit', compact(['bantuan']));
    }
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'judulIsi' => 'required|max:255',
            'isiBantuan' => 'required',
        ]);
        
        Bantuan::where('id', $request->id)
          ->update([
              'judulIsi' => $request->judulIsi,
              'isiBantuan' => $request->isiBantuan,
          ]);
          
        return redirect('/bantuan')->with('status', 'Data Isi Bantuan Berhasil Diubah!');
    }
    public function destroy($id)
    {
        Bantuan::destroy($id);
        return redirect('/bantuan')->with('status', 'Data Isi Bantuan Berhasil Dihapus!');
    }



}
