<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Jalan;
use App\Kriteria;
use DB;
use stdClass;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalan = Jalan::all();
        $kriteria = Kriteria::all();

        return view('nilai.index', [
            'jalan'=> $jalan,
            'kriteria'=> $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jalan = Jalan::find($id);
        $kriteria = Kriteria::all();
        return view('nilai.create', [
            'master_kriteria'=> $kriteria,
            'jalan'=> $jalan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->except('_token');

        $jalan_id = $data['jalan_id'];
        
        $kriteria_id = $data['kriteria_id'];
        foreach($kriteria_id as $key => $value){
            echo $key . ' - ' . $value . '<br>';
            $objData = new stdClass();
            $objData->jalan_id = $jalan_id;
            $objData->kriteria_id = $key;
            $objData->nilai_alt = $value;
            $objArray[] = $objData;
        }
        foreach ($objArray as $data) {
            
            Nilai::create([
                'jalan_id' => (int) $data->jalan_id,
                'kriteria_id' => $data->kriteria_id,
                'nilai_alt' => $data->nilai_alt
            ]);
        }
        
        return redirect(route('nilai'));
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
        $kriteria = Kriteria::all();
        return view('nilai.edit', compact(['jalan', 'kriteria']));
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
        $data = $request->except('_token');
        $nilai_id = $data['id_nilai'];
        $kriteria_id = $data['kriteria_id'];
        foreach ($nilai_id as $nilai) {
            $nilaiData = new stdClass();
            $nilaiData->id = $nilai;
            $nilaiArray[] = $nilaiData;
        }
        // echo json_encode($nilaiArray);
        // echo '<br>';
        $i = 0;
        foreach ($kriteria_id as $key => $value) {
            $objData = new stdClass();
            $objData->id_nilai = $nilaiArray[$i]->id;
            $objData->jalan_id = $id;
            $objData->kriteria_id = $key;
            $objData->nilai_alt = $value;
            $objArray[] = $objData;
            $i++;
        }
        // echo json_encode($objArray);exit;
        foreach($objArray as $data) {
            $save = Nilai::find($data->id_nilai);
            $save->nilai_alt = $data->nilai_alt;
            $save->save();
        }        
        return redirect(route('nilai'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
