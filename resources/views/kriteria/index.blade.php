@extends('layouts.master')

@section('title', 'Kriteria')

@section('content')
<div class="single-product-area section-padding-100 clearfix" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Data Kriteria</li>
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
                      <th>#</th>
                      <th>Nama Kriteria</th>
                      <th>Jenis</th>
                      <th>Bobot</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($kriteria as $krit)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $krit->nama }}</td>
                        <td>{{ $krit->jenis }}</td>
                        <td>{{ $krit->bobot }}</td>
                        <td>
                            <a href="/kriteria/{{ $krit->id }}/edit" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>
                            <form action="/kriteria/{{ $krit->id }}" method="post" class="d-inline">
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