@extends('layouts.master')

@section('title', 'Nilai')

@section('content')
<div class="single-product-area section-padding-100 clearfix" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Data Nilai</li>
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
                        <th width="20vh">No</th>
                        <th>Nama</th>
                        @foreach($kriteria as $krit)
                        <th>{{$krit->nama}}</th>
                        @endforeach
                        <th width="100vh">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @if(!empty($jalan))
                    {{-- variable $jalan berisi nilai dari setiap kriteria per jalan --}}
                    @foreach($jalan as $jln)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$jln->nama}}</td>
                        @if(count($jln->nilais) == 0)
                        @foreach($kriteria as $krit)
                        <td><i>Tidak ada data</i></td>
                        @endforeach
                        @else
                        @foreach($jln->nilais as $nilai)
                        <td>{{$nilai->nilai_alt}}</td>
                        @endforeach
                        @endif
                        <td class="text-center">
                            @if(count($jln->nilais) == 0)
                            <a href="{{ route('nilai.tambah',['id' => $jln->id]) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                            @else
                            <a href="{{ route('nilai.edit', ['id' => $jln->id]) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
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