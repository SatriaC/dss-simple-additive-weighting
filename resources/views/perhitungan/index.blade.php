@extends('layouts.master')

@section('title', 'SAW')

@section('content')
<div class="single-product-area section-padding-100 clearfix" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan & Ranking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Rangking</li>
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
              <div class="card-header">
                <h3 class="card-title">Nilai</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="/hitung/exportpdf" class="btn btn-sm btn-danger">Export PDF <i class="fas fa-file-pdf"></i></a>

                    <div class="input-group-append">
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="dataTable3" class="table table-hover">
                  <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        @foreach($kriteria as $krit)
                        <th class="text-center">{{$krit->nama}}</th>
                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($jalan))
                    @foreach($jalan as $data)
                    <tr>
                        <td>
                            {{$data->nama}}
                        </td>
                        @foreach($data->nilais as $nilai)
                        <td>{{ $nilai->nilai_alt }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                    </tr>
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
    <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Normalisasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTable2" class="table table-bordered">
                  <thead>                  
                    <tr>
                        <th class="text-center">Kode</th>
                        <?php $bobot = [] ?>
                        @foreach($kriteria as $krit)
                        <?php $bobot[$krit->id] = $krit->bobot ?>
                        <th class="text-center">{{$krit->nama}} [{{ $krit->bobot }}]</th>
                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($jalan))
                    <?php $ranking = []; ?>
                    @foreach($jalan as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <?php $total = 0; ?>
                        @foreach($data->nilais as $nilai)
                        
                            @if($nilai->kriteria->jenis == 'Cost')
                                <?php $normalisasi = number_format(($kode_krit[$nilai->kriteria->id] / $nilai->nilai_alt), 2); ?>
                            @elseif($nilai->kriteria->jenis == 'Benefit')
                            
                                <?php $normalisasi = number_format(($nilai->nilai_alt / $kode_krit[$nilai->kriteria->id]), 2); ?>
                            @endif
                            <?php $total = number_format($total + ($bobot[$nilai->kriteria->id] * $normalisasi), 2); ?>
                            <td>{{$normalisasi}}
                            </td>
                        @endforeach
                        <?php $ranking[] = [
                            'nama'  => $data->nama,
                            'total' => $total
                        ]; ?>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rangking</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTable1" class="table table-bordered">
                  <thead>                  
                    <tr>
                        <th>Jalan</th>
                        <th>Total</th>
                        <th>Ranking</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        // var_dump($ranking);
                    usort($ranking, function ($a, $b) {
                        return strcmp($a['total'], $b['total']);
                        // return $a['total'] <=> $b['total'];
                    });
                    $ranking = array_reverse($ranking);
                    // print_r($ranking[0]);
                    // rsort($ranking);
                    // asort($ranking);
                    // array_revers
                    $a = 1;
                    ?>
                    @foreach($ranking as $t)
                    <tr>
                        <td>{{ $t['nama'] }}</td>
                        <td>{{$t['total']}}</td>
                        <td>{{$a++}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      <!-- /.row -->
    
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Kesimpulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <h4>Maka, didapat dengan peringkat nomor 1 adalah alternatif dengan nama <strong>{{ current($ranking)['nama'] }}</strong></h4>
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
      "paging": false,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
    });
  });
</script>
@stop

@section('js1')
<!-- DataTables -->
<script>
    $(function() {
        $('#data').DataTable({
            "paging": false,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
        $('#normalisasi').DataTable({
            "paging": false,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
        $('#ranking').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "aaSorting": [[2, 'asc']]
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
    });
</script>
@endsection