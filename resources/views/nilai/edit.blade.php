@extends('layouts.master')

@section('title', 'Edit Nilai')

@section('content')
<div class="single-product-area section-padding-100 clearfix" >
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Ubah Nilai</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Ubah Nilai</li>
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
                        <h3 class="card-title">Form Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('nilai.update', ['id' => Request::segment(2)]) }}" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10 offset-sm-1">
                                     <!-- text input -->
                                     <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="alert alert-info alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h5><i class="icon fas fa-info"></i> Alert! <strong>(Jenis Pekerjaan)</strong></h5>
                                                    Flexible => 0.75 <br>
                                                    Pavling Block => 0.5 <br>
                                                    Rigid => 0.25  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="alert alert-info alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h5><i class="icon fas fa-info"></i> Alert! <strong>(Kondisi Jalan)</strong></h5>
                                                    Remak => 1 <br>
                                                    Aus/Licin => 0.8 <br>
                                                    Berlubang => 0.6 <br>
                                                    Mengelupas => 0.4 <br>
                                                    Retak => 0.2 <br>
                                                    Mulus/Mantap => 0.1 <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                    @if(!empty($jalan))
                                    <div class="form-group">
                                        <label for="jalan">Nama Jalan</label>
                                        <input type="hidden" name="jalan_id" value="{{ $jalan->id }}">
                                        <input type="text" class="form-control" value="{{ $jalan->nama }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        @foreach($jalan->nilais as $key => $value)
                                        <?php $krit = $kriteria[$key]; $krit_err = "kriteria_id[$krit->id]" ?>
                                        @if($krit->id == $value->kriteria_id)
                                        <label for="{{$krit->kode}}">{{ $krit->nama }}</label>
                                        <input type="hidden" name="id_nilai[{{ $value->id }}]" value="{{ $value->id }}">
                                        <input type="text" class="form-control" name="{{$krit_err}}" value="{{ $value->nilai_alt }}">
                                        @elseif(empty($krit))
                                        <p>Fail</p>
                                        @endif
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="form-group text-center">
                                        Data Tidak Ditemukan
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-sm-10 offset-sm-1">
                                @if(!empty($jalan))
                                <button type="submit" class="btn btn-primary">Update</button>
                                @else
                                <a href="{{ route('nilai') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
@stop