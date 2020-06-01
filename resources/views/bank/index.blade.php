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
                <div class="card" style="border-color:#994d00">
                    <div class="card-header text-white" style="background-color:#994d00">
                        <div class="row">
                            <div class="col">
                                <h3>Jenis Rekening</h3>
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
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <form action="{{route('bank.store')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Nama bank</label>
                                                        <input type="text" name="nama" class="form-control" required id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alamat bank</label>
                                                        <textarea name="alamat_bank" id="" cols="32" rows="10" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <h4>Jenis bank</h4><br>
                                                                <label for="">Fungsi</label>
                                                                    <select class="custom-select" name="fungsi">
                                                                        <option value="Sentral">Sentral</option>
                                                                        <option value="umum">Umum</option>
                                                                        <option value="BPR">Perkreditan Rakyat</option>
                                                                    </select>

                                                                <label for="">Operasional</label>
                                                                    <select class="custom-select" name="operasi">
                                                                        <option value="Konvesional">Konvesional</option>
                                                                        <option value="Syariah">Syariah</option>
                                                                    </select>

                                                                <label for="">Kepemilikan</label>
                                                                    <select class="custom-select" name="kepemilikan">
                                                                        <option value="Pemerintah">Pemerintah</option>
                                                                        <option value="Swasta Nasional">Swasta Nasional</option>
                                                                        <option value="Koperasi">Koperasi</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status bank</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Devisa">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Devisa
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="Non-Devisa">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Non-Devisa
                                                            </label>
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
                            <table class="table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama bank</th>
                                        <th>alamat bank</th>
                                        <th>jenis bank</th>
                                        <th>status bank</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($bank as $data)
                                    
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nama_bank}}</td>
                                            <td>{{$data->alamat_bank}}</td>
                                            <td>
                                                <?php
                                                    $array = explode(",",$data->jenis_bank);
                                                    foreach ($array as $key => $value) {
                                                ?>
                                                        <ul class=" list-unstyled">
                                                            <li>
                                                                {{$value}}
                                                            </li>
                                                        </ul>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td>{{$data->status_bank}}</td>
                                            <td>
                                                <form action="{{ route('bank.destroy',$data->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{route('bank.show',$data->id)}}" role="button" class="btn btn-success"> Lihat </a>
                                                    <a href="{{route('bank.edit',$data->id)}}" role="button" class="btn btn-warning"> Edit </a>
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