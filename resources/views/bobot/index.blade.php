@extends('layouts.master')

@section('title', 'Pengaturan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <h1 class="mt-3">Pengaturan SPK</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Button trigger modal -->

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Pekerjaan</th>
                        <th scope="col">Kondisi Jalan</th>
                        <th scope="col">Umur Jalan</th>
                        <th scope="col">Luas Kerusakan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bobot as $bbt)
                    <tr>
                        <th scope="row"><b>Nilai Bobot</b></th>
                        <td>{{ $bbt->jenisPekerjaan }}</td>
                        <td>{{ $bbt->kondisiJalan }}</td>
                        <td>{{ $bbt->umurJalan }}</td>
                        <td>{{ $bbt->luasKerusakan }}</td>
                    </tr>
                    <tr>
                        <th scope="row"><b>Jenis Bobot</b></th>
                        <td>{{ $bbt->JenisBobotPekerjaan }}</td>
                        <td>{{ $bbt->JenisBobotKondisi }}</td>
                        <td>{{ $bbt->JenisBobotUmur }}</td>
                        <td>{{ $bbt->JenisBobotLuas }}</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">Atur Ulang</button>
            <form action="/bobot/{{ $bbt->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
                @endforeach
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/bobot" method="POST">
      @csrf
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Pekerjaan</th>
                    <th scope="col">Kondisi Jalan</th>
                    <th scope="col">Umur Jalan</th>
                    <th scope="col">Luas Kerusakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><b>Nilai Bobot</b></th>
                    <td>
                        <!-- <div class="form-group col-md-4"> -->
                            <select id="inputState" class="form-control @error('jenisPekerjaan') is-invalid @enderror" name="jenisPekerjaan">
                                <option selected></option>
                                <option>0.1</option>
                                <option>0.2</option>
                                <option>0.3</option>
                                <option>0.4</option>
                            </select>
                            @error('jenisPekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        <!-- </div> -->
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('kondisiJalan') is-invalid @enderror" name="kondisiJalan">
                            <option selected></option>
                            <option>0.1</option>
                            <option>0.2</option>
                            <option>0.3</option>
                            <option>0.4</option>
                        </select>
                        @error('kondisiJalan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('umurJalan') is-invalid @enderror" name="umurJalan">
                            <option selected></option>
                            <option>0.1</option>
                            <option>0.2</option>
                            <option>0.3</option>
                            <option>0.4</option>
                        </select>
                        @error('umurJalan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('luasKerusakan') is-invalid @enderror" name="luasKerusakan">
                            <option selected></option>
                            <option>0.1</option>
                            <option>0.2</option>
                            <option>0.3</option>
                            <option>0.4</option>
                        </select>
                        @error('luasKerusakan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row"><b>Jenis Bobot</b></th>
                    <td>
                        <select id="inputState" class="form-control @error('JenisBobotPekerjaan') is-invalid @enderror" name="JenisBobotPekerjaan">
                            <option selected></option>
                            <option>Benefit</option>
                            <option>Cost</option>
                        </select>
                        @error('JenisBobotPekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('JenisBobotKondisi') is-invalid @enderror" name="JenisBobotKondisi">
                            <option selected></option>
                            <option>Benefit</option>
                            <option>Cost</option>
                        </select>
                        @error('JenisBobotKondisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('JenisBobotUmur') is-invalid @enderror" name="JenisBobotUmur">
                            <option selected></option>
                            <option>Benefit</option>
                            <option>Cost</option>
                        </select>
                        @error('JenisBobotUmur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <select id="inputState" class="form-control @error('JenisBobotLuas') is-invalid @enderror" name="JenisBobotLuas">
                            <option selected></option>
                            <option>Benefit</option>
                            <option>Cost</option>
                        </select>
                        @error('JenisBobotLuas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
@stop