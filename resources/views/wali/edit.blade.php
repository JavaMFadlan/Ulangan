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
                        <form action="{{route('wali.update',$wali->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                            <input type="text" name="nama" class="form-control" value="{{$wali->nama}}" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <select class="custom-select" name="id_mahasiswa">
                                    @php
                                        $k = null;
                                    @endphp
                                    @foreach ($mahasiswa as $data)
                                        @if ($wali->id_mahasiswa == $data->id)
                                        <option selected value="{{$data->id}}">{{$data->nama}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                        @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection