<h1>Data Jalan</h1>
<table class="table table-bordered">
  <thead>                  
    <tr>
      <th style="width: 20px">Nama</th>
      @foreach($kriteria as $krit)
        <th class="text-center">{{$krit->nama}}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>
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
  </tbody>
</table>
<br>

<h1>Hasil Normalisasi</h1>
<table id="" class="table table-bordered">
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
<br>
<h1>Hasil Ranking</h1>
<table id="" class="table table-bordered">
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
<br>
<h4>Maka, didapat dengan peringkat nomor 1 adalah alternatif dengan nama <strong>{{ current($ranking)['nama'] }}</strong></h4>