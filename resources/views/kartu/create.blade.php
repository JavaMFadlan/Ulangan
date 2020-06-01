@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Dosen
                    </div>
                    <div class="card-body">
                        <form action="{{route('rekening.store')}}" method="post">
                            @csrf
                        @foreach ($explode as $data)
                        <input type="hidden" name="nama" value="{{$data[0]}}">
                        <input type="hidden" name="alamat" value="{{$data[1]}}">
                        <input type="hidden" name="no_telepon" value="{{$data[2]}}">
                        <input type="hidden" name="tgl_lahir" value="{{$data[3]}}">
                        <input type="hidden" name="pekerjaan" value="{{$data[4]}}">
                        <input type="hidden" name="buat" value="{{$data[5]}}">
                        <?php $buat = $data[5]?>
                        @endforeach
                            @for ($i = 0; $i < $buat; $i++)
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">Pegawai Yang Menerima</label>
                                        <select class="form-control" name="pegawai[]" id="">
                                            @foreach ($pegawai as $data)
                                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Jenis Rekening</label>
                                        <select class="form-control" name="jenis_rekening[]" id="">
                                            @foreach ($jenis as $data)
                                                <option value="{{$data->id}}">{{$data->jenis_rekening}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 m-auto">
                                <div class="form-group">
                                        <label for="">Saldo</label>
                                        <input type="number" name="saldo[]" class="form-control" required id="">
                                </div>
                            </div>
                            <div class="col-md-5 m-auto">
                                <div class="form-group">
                                        <label for="">Sandi Kartu</label>
                                        <input type="number" name="sandi[]" class="form-control" required id="">
                                </div>
                            </div>
                            <br><br><br><br><br>
                            @endfor
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"class="m-auto" id="">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection