@extends('layouts.master')

@section('title', 'Form Edit Isi Bantuan')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Form Edit Isi Bantuan</h1>
                <form action="/bantuan/{{ $bantuan->id }}" method="POST">
                @method('patch')
                @csrf
                    <div class="form-group">
                        <label for="judulIsi">Judul</label>
                        <input type="text" name="judulIsi" class="form-control @error('judulIsi') is-invalid @enderror" id="judulIsi" value="{{ $bantuan->judulIsi }}">
                        @error('judulIsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isiBantuan">Isi Bantuan</label>
                        <textarea name="isiBantuan" class="form-control @error('isiBantuan') is-invalid @enderror" id="isiBantuan" rows="15">{{ $bantuan->isiBantuan }}</textarea>
                        @error('isiBantuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop