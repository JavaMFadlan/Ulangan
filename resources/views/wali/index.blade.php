@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @if (session('message1'))
                    <div class="alert alert-danger" role="alert">
                        {{session('message1')}}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data wali
                    <a href="{{route('wali.create')}}" class="float-right">
                    Tambah Data
                    </a>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Nama mahasiswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($wali as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->mahasiswa->nama}}</td>
                                                <td> 
                                                    <form action="{{ route('wali.destroy',$data->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{route('wali.show',$data->id)}}" role="button" class="btn btn-success"> Lihat </a>
                                                        <a href="{{route('wali.edit',$data->id)}}" role="button" class="btn btn-warning"> Edit </a>
                                                        <input class="btn btn-danger" type="submit" value="Hapus">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="ml-auto">
                                {{$wali->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection