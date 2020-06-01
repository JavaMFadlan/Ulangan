@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah Data wali
                    </div>
                    <div class="card-body">
                        <form action="{{route('wali.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                                <input type="text" name="nama" class="form-control" required id="">
                            </div>
                            <div class="form-group">
                                <label for="">mahasiswa</label>
                                <select class="custom-select" name="id_mahasiswa">
                                        @foreach ($mahasiswa as $data)
                                        @if (isset($wali->id_mahasiswa) == $data->id)
                                        @php
                                        
                                        @endphp
                                        @else    
                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                        @endif
                                        @endforeach
                                </select>
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