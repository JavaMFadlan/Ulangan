@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Data
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                            <input type="text" name="nama" disabled class="form-control" value="{{$wali->nama}}" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" name="nipd" disabled class="form-control" value="{{$wali->mahasiswa->nama}}" id="">
                            </div>
                            <div class="form-group">
                                <a href="{{url()->previous()}}" role="button" class="btn btn-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection