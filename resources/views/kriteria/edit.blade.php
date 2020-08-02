@extends('layouts.master')

@section('title', 'Form Tambah Data Kriteria')

@section('content')

<div class="single-product-area section-padding-100 clearfix">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Ubah Kriteria</li>
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
                            <h3 class="card-title">Form Ubah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- text input -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-info"></i> Alert! <strong>(Bobot)</strong>
                                        </h5>
                                        - Jenis Cost merupakan jenis bobot yang memperhitungkan keuangan <br>
                                        - Jenis Benefit merupakan jenis bobot yang mengutamakan manfaat/tidak
                                        memperhitungkan uang <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>

                        <!-- form start -->
                        <form role="form" action="/kriteria/{{ $kriteria->id }}" method="POST">
                            <div class="card-body">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama Kriteria" value="{{ $kriteria->nama }}">
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Bobot</label>
                                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                                        id="jenis">
                                        <option></option>
                                        <option>Benefit</option>
                                        <option>Cost</option>
                                    </select>
                                    @error('jenis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Nilai Bobot</label>
                                    <input type="text" name="bobot"
                                        class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                                        placeholder="Masukkan Nilai Bobot" value="{{ $kriteria->bobot }}">
                                    @error('bobot')
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