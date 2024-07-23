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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <div class="row">
                            <div class="col">
                                <h3>Data Pegawai</h3>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModalLong">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                            </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <form action="{{route('pegawai.store')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">No Pegawai</label>
                                                            <input type="number" name="no" class="form-control" required id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Pegawai</label>
                                                            <input type="text" name="nama" class="form-control" required id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Alamat Pegawai</label>
                                                            <textarea name="alamat" cols="32" rows="10" required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">tanggal Lahir</label>
                                                            <input type="date" name="tgl" class="form-control" required id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="card">
                                                                <div class="card-body text-center">
                                                                    <h4>Nama bank</h4><br>
                                                                        <select class="custom-select" name="bank">
                                                                            @foreach ($bank as $data)
                                                                            <option value="{{$data->id}}">{{$data->nama_bank}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="float-right">
                                                            <input type="submit" class="btn btn-success" value="Simpan">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>No Pegawai</th>
                                        <th>Nama Bank</th>
                                        <th>Nama Pegawai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($pegawai as $data)
                                    @php
                                        // var_dump($data);
                                    @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->no_pegawai}}</td>
                                            <td>{{$data->cabang_bank->nama_bank}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>
                                                <form action="{{ route('pegawai.destroy',$data->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{route('pegawai.show',$data->id)}}" role="button" class="btn btn-success"> Lihat </a>
                                                    <a href="{{route('pegawai.edit',$data->id)}}" role="button" class="btn btn-warning"> Edit </a>
                                                    <input class="btn btn-danger" type="submit" value="Hapus">
                                                </form>
                                                {{-- <a href="{{route('bank.destroy',$dat  a->id)}}"> Hapus</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    $('#table').DataTable({
        orderCellsTop: true,
        searching: true,
        pagingType: "full_numbers",
        lengthChange: false,
        pageLength: 5,
    });
    </script>
@endsection
