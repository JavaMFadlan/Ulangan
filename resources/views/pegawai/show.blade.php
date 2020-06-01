@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-center">
                        <h3>Pegawai Yang Melayani</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="nama" class="form-control" value="{{$pegawai->nama}}" disabled required id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="">No Pegawai</label>
                                <input type="text" name="no_telepon" class="form-control" value="{{$pegawai->no_pegawai}}" disabled required  id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Alamat Pegawai</label>
                                    <input type="text" name="alamat" class="form-control" required id="" value="{{$pegawai->alamat}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="">tanggal Lahir</label>
                                <input type="date" name="tgl" class="form-control" value="{{$pegawai->tgl_lahir}}" required disabled id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Nama bank</h4><br>
                                    <select class="custom-select" name="bank">
                                        @foreach ($bank as $data)
                                        <option <?php if($data->id == $pegawai->id_bank)  echo 'selected'  ?> disabled value="{{$data->id}}">{{$data->nama_bank}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection