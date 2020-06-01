@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-center">
                        <h3>Data Kartu</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">No Kartu</label>
                                    <input type="text" name="nama" class="form-control" value="{{$kartu->no_kartu}}" disabled required id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">kode_cvv</label>
                                    <input type="text" name="pekerjaan" class="form-control" value="{{$kartu->kode_cvv}}" disabled required  id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Berlaku Sampai</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="{{$kartu->masa_berlaku}}" disabled required  id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Sandi Kartu</label>
                                <input type="number" name="tgl_lahir" class="form-control" value="{{$kartu->no_sandi}}" disabled required  id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection