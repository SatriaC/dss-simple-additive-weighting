<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = Bobot::all();
        return view('bobot.index', compact(['bobot']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'jenisPekerjaan' => 'required',
            'kondisiJalan' => 'required',
            'umurJalan' => 'required',
            'luasKerusakan' => 'required',
            'JenisBobotPekerjaan' => 'required',
            'JenisBobotKondisi' => 'required',
            'JenisBobotUmur' => 'required',
            'JenisBobotLuas' => 'required',
        ]);
        
        Bobot::create($request->all());

        return redirect('/bobot')->with('status', 'Pengaturan Bobot Berhasil Dibuat!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bobot::destroy($id);
        return redirect('/bobot')->with('status', 'Pengaturan Bobot Berhasil Dihapus!');
    }
}
