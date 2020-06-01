@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Tambah Data Nasabah</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('nasabah.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">Nama Nasabah</label>
                                        <input type="text" name="nama" class="form-control" required id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" required  id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">Nomor Telepon</label>
                                        <input type="number" name="no_telepon" class="form-control" required  id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" required  id="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" required  id="">
                            </div>
                            <div class="form-group">
                                <label for="">Ingin Membuat Berapa Rekening ?</label>
                                <input type="number" name="membuat" class="form-control" required  id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection