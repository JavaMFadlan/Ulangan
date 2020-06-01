@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-success">
                        <h3>Nasabah</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Nama Nasabah</label>
                                <input type="text" name="nama" class="form-control" value="{{$nasabah->nama}}" disabled id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{$nasabah->alamat}}" disabled  id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input type="number" name="no_telepon" class="form-control" value="{{$nasabah->no_telepon}}" disabled  id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" value="{{$nasabah->tgl_lahir}}" disabled  id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{$nasabah->pekerjaan}}" disabled  id="">
                        </div>
                        <?php $total = 0;?>
                        <div class="form-group">
                            <label for="">Total Saldo</label>
                            @foreach ($nasabah->rekening as $item)
                            <?php
                            $total += $item->saldo;
                            ?>
                            @endforeach
                        <?php $total1 = number_format($total);?>
                        <input type="text" name="pekerjaan" class="form-control" value="{{"Rp. " . $total1}}" disabled  id="">
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" role="button" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach ($nasabah->rekening as $item)
                    <div class="col-sm-6 mb-4">
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-center">
                                <h3>Data Rekening</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label for="">No Rekening</label>
                                            <input type="text" name="nama" class="form-control" value="{{$item->no_rekening}}" disabled required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="text" name="no_telepon" class="form-control" value="{{$item->aktif}}" disabled required  id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label for="">Saldo</label>
                                            <input type="text" name="pekerjaan" class="form-control" value="{{ "Rp .". number_format($item->saldo)}}" disabled required  id="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Berlaku Sampai</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="{{$item->masa_pakai}}" disabled required  id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('rekening.show',$item->id)}}" role="button" class="btn btn-warning">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="row">
                    @foreach ($kartu as $item)
                    <div class="col-sm-6 mb-4">
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-center">
                                <h3>Data Kartu</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label for="">No Kartu</label>
                                            <input type="text" name="nama" class="form-control" value="{{$item->no_kartu}}" disabled required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">kode_cvv</label>
                                            <input type="text" name="pekerjaan" class="form-control" value="{{$item->kode_cvv}}" disabled required  id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mx-auto">
                                        <div class="form-group">
                                            <label for="">Berlaku Sampai</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="{{$item->masa_berlaku}}" disabled required  id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('kartu.show',$item->id)}}" role="button" class="btn btn-danger">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="row">
                    @foreach ($cuma as $item)
                    <div class="col-sm-6 mb-4">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-center">
                                <h3>Pegawai Yang Melayani</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label for="">Nama Pegawai</label>
                                            <input type="text" name="nama" class="form-control" value="{{$item->nama}}" disabled required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">No Pegawai</label>
                                        <input type="text" name="no_telepon" class="form-control" value="{{$item->no_pegawai}}" disabled required  id="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('pegawai.show',$item->id)}}" role="button" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection