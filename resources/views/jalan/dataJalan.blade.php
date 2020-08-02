@extends('layouts.master')

@section('title', 'Data Jalan')

@section('css')
@stop
@section('content')
<div class="single-product-area section-padding-100 clearfix">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Jalan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Profil Jalan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="DataTable2" class="table table-hover">
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
                        <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jalan as $jln)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $jln->nama }}</td>
                        <td>{{ $jln->panjang }}</td>
                        <td>{{ $jln->lebar }}</td>
                        <td>{{ $jln->kondisi }}</td>
                        <td>{{ $jln->jenisPekerjaan }}</td>
                        <td>{{ $jln->luasKerusakan }}</td>
                        <td>{{ $jln->tahunPembangunan }}</td>
                        <td>
                            <a href="/jalan/{{ $jln->id }}/edit" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>
                            <form action="/jalan/{{ $jln->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@stop
@section('content1')
<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jalan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Data Jalan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="DataTable2" class="table table-hover">
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
                        <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jalan as $jln)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $jln->nama }}</td>
                        <td>{{ $jln->panjang }}</td>
                        <td>{{ $jln->lebar }}</td>
                        <td>{{ $jln->kondisi }}</td>
                        <td>{{ $jln->jenisPekerjaan }}</td>
                        <td>{{ $jln->luasKerusakan }}</td>
                        <td>{{ $jln->tahunPembangunan }}</td>
                        <td>
                            <a href="/jalan/{{ $jln->id }}/edit" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>
                            <form action="/jalan/{{ $jln->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@stop


@section('js')
<script>
  $(function () {
    $("#DataTable1").DataTable();
    $("#DataTable2").DataTable();
    $('#DataTable3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
@stop

