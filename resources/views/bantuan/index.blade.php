@extends('layouts.master')

@section('title', 'Bantuan')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-12">
            <h1 class="mt-3">Bantuan</h1>
            <a href="/bantuan/create" class="btn btn-primary my-2">Buat Pesan di Fitur Bantuan</a>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <td>Judul</td>
                        <td>Isi</td>
                        <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bantuan as $bant)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $bant->judulIsi }}</td>
                        <td>{{ $bant->isiBantuan }}</td>
                        <td>
                            <a href="/bantuan/{{ $bant->id }}/edit" class="btn btn-info">Edit </a>
                            <form action="/bantuan/{{ $bant->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

@stop