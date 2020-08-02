@extends('layouts.master')

@section('title', 'Data Jalan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1 class="mt-3">Data Inputan Jalan</h1>
            <a href="/jalan/create" class="btn btn-primary my-2">Tambah Data Jalan</a>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Jalan</th>
                        <th scope="col">Panjang</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">Jenis Pekerjaan</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Luas Kerusakan</th>
                        <th scope="col">Tahun Pembangunan</th>
                        <th scope="col">Nilai SAW</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

@stop   

