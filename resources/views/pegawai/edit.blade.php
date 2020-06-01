@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Ubah Data</h1>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 mx-auto">
                            <form action="{{route('pegawai.update',$pegawai->id)}}" method="post">
                                @method('Patch')
                                @csrf
                                <input type="hidden" name="no" class="form-control" required id="" value="{{$pegawai->no_pegawai}}">
                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                <input type="text" name="nama" class="form-control" required id="" value="{{$pegawai->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Pegawai</label>
                                <input type="text" name="alamat" class="form-control" required id="" value="{{$pegawai->alamat}}">
                                </div>
                                <div class="form-group">
                                    <label for="">tanggal Lahir</label>
                                <input type="date" name="tgl" class="form-control" value="{{$pegawai->tgl_lahir}}" required id="">
                                </div>
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4>Nama bank</h4><br>
                                                <select class="custom-select" name="bank">
                                                    @foreach ($bank as $data)
                                                    <option <?php if($data->id == $pegawai->id_bank)  echo 'selected'  ?> value="{{$data->id}}">{{$data->nama_bank}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection