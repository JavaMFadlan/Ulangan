@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-center">
                        <h3>Data Kartu</h3>
                    </div>
                    <form action="{{route('kartu.update',$kartu->id)}}" method="post"> @method('PUT') @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">No Kartu</label>
                                        <input type="text" name="no_kartu" class="form-control" value="{{$kartu->no_kartu}}" disabled required id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">kode_cvv</label>
                                        <input type="text" name="kode_cvv" class="form-control" value="{{$kartu->kode_cvv}}" disabled required  id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">Berlaku Sampai</label>
                                    <input type="date" name="masa_berlaku" class="form-control" value="{{$kartu->masa_berlaku}}" disabled required  id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Sandi</label>
                                        <input type="number" max="999999" name="no_sandi" class="form-control" value="{{$kartu->no_sandi}}" required  id="">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-lg btn-warning m-auto float-right" value="Edit">
                    </form>
                            <div class="form-group">
                                <form action="{{ route('kartu.destroy',$kartu->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Hapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection