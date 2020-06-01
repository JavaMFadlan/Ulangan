@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-center">
                        <h3>Data Rekening</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">No Rekening</label>
                                    <input type="text" name="nama" class="form-control" value="{{$rekening->no_rekening}}" disabled required id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" name="no_telepon"  class="form-control" value="{{$rekening->aktif}}" disabled required  id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Saldo</label>
                                    <input type="text" name="pekerjaan" class="form-control" value="{{$rekening->saldo}}" disabled required  id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Berlaku Sampai</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="{{$rekening->masa_pakai}}" disabled required  id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">No Kartu</label>
                                    <input type="text" name="pekerjaan" class="form-control" value="{{$kartu->no_kartu}}" disabled required  id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Jenis Kartu</label>
                                <input type="text" name="" class="form-control" value="{{$jenis->jenis_rekening}}" disabled required  id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection