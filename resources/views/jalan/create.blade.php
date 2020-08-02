@extends('layouts.master')

@section('title', 'Form Tambah Data Jalan')

@section('content')
<div class="single-product-area section-padding-100 clearfix" >
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Tambah Data Jalan</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Tambah Data Jalan</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="/jalan" method="POST">
                        <div class="card-body">
                        @csrf
                            <div class="form-group">
                                <label for="nama">Nama Jalan</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Jalan" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="panjang">Panjang Jalan</label>
                                <input type="text" name="panjang" class="form-control @error('panjang') is-invalid @enderror" id="panjang" placeholder="Masukkan Panjang Jalan" value="{{ old('panjang') }}">
                                @error('panjang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="lebar">Lebar Jalan</label>
                                <input type="text" name="lebar" class="form-control  @error('lebar') is-invalid @enderror" id="lebar"placeholder="Masukkan Lebar Jalan" value="{{ old('lebar') }}">
                                @error('lebar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="luasKerusakan">Luas Kerusakan</label>
                                    <input type="text" class="form-control @error('luasKerusakan') is-invalid @enderror" name="luasKerusakan" id="luasKerusakan" placeholder="Masukkan Luas Kerusakan Jalan" value="{{ old('luasKerusakan') }}">
                                    @error('luasKerusakan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tahunPembangunan">Tahun Pembangunan</label>
                                    <input type="text" class="form-control @error('tahunPembangunan') is-invalid @enderror" name="tahunPembangunan" id="tahunPembangunan"placeholder="Masukkan Tahun Pembangunan Jalan" value="{{ old('tahunPembangunan') }}">
                                    @error('tahunPembangunan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                <input type="text" class="form-control" id="jenisPekerjaan" placeholder="Masukkan Jenis Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi Jalan</label>
                                <input type="text" class="form-control" id="kondisi" placeholder="Masukkan Kondisi Jalan">
                            </div> -->
                            <div class="form-group">
                                <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                <select class="form-control @error('jenisPekerjaan') is-invalid @enderror" name="jenisPekerjaan" id="jenisPekerjaan">
                                    <option></option>
                                    <option>Rigid</option>
                                    <option>Flexible</option>
                                    <option>Pavling Blocks</option>
                                </select>
                                @error('jenisPekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi Jalan</label>
                                <select class="form-control @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi">
                                    <option></option>
                                    <option>Baik</option>
                                    <option>Retak</option>
                                    <option>Mengelupas</option>
                                    <option>Berlubang</option>
                                    <option>Aus/Licin</option>
                                    <option>Remak</option>
                                </select>
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
@stop   

