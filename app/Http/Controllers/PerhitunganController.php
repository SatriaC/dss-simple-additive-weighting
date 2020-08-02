<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jalan;
use App\Kriteria;
use PDF;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $jalan = Jalan::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach($jalan as $jln)
            {
                foreach($jln->nilais as $nilai)
                {
                    if ($nilai->kriteria->id == $krit->id)
                    {
                        $kode_krit[$krit->id][] = $nilai->nilai_alt;
                    }
                    // echo json_encode(max($nilai->nilai_alt));
                }
            }
            
            if ($krit->jenis == 'cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } 
            elseif ($krit->jenis == 'Benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        }
        // echo json_encode($kode_krit);exit;

        // var_dump($kode_krt);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'jalan'    => $jalan,
            'kode_krit'     => $kode_krit
        ]);
    }
    public function exportPdf()
    {
        $kriteria = Kriteria::all();
        $jalan = Jalan::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach($jalan as $jln)
            {
                foreach($jln->nilais as $nilai)
                {
                    if ($nilai->kriteria->id == $krit->id)
                    {
                        $kode_krit[$krit->id][] = $nilai->nilai_alt;
                    }
                    // echo json_encode(max($nilai->nilai_alt));
                }
            }
            
            if ($krit->jenis == 'Cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } 
            elseif ($krit->jenis == 'Benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        }
        // echo json_encode($kode_krit);exit;
        $pdf = PDF::loadView('export.exportpdf', compact(['kriteria', 'jalan', 'kode_krit']));
        return $pdf->download('SPK Jalan Lingkungan.pdf');
    }
}
