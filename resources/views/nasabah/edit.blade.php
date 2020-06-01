@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center bg-success">
                        <h3>Nasabah</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('nasabah.update',$nasabah->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Nama Nasabah</label>
                                <input type="text" name="nama" class="form-control" value="{{$nasabah->nama}}" id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{$nasabah->alamat}}" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input type="number" name="no_telepon" class="form-control" value="{{$nasabah->no_telepon}}"  id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" value="{{$nasabah->tgl_lahir}}" id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{$nasabah->pekerjaan}}" id="">
                        </div>
                        <?php $total = 0;?>
                        <div class="form-group">
                            <label for="">Total Saldo</label>
                            @foreach ($nasabah->rekening as $item)
                            <?php
                            $total += $item->saldo;
                            ?>
                            @endforeach
                            <input type="number" name="pekerjaan" class="form-control" value="{{$total}}" disabled  id="">
                        </div>
                        <div class="row m-auto">
                            <div class="form-group">
                                <input type="submit" value="Edit" class="btn btn-success">
                            </div>
                            <div class="col"></div>
                            <div class="form-group">
                                <a href="{{url()->previous()}}" role="button" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                                                        <input type="text" class="form-control" name="no_rekening" value="{{$item->no_rekening}}" disabled required id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="aktif[]" type="checkbox" <?php if ($item->aktif == 'aktif') echo 'checked' ; ?> value="{{$item->aktif}}" disabled id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Aktif
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row m-auto">
                                                <div class="form-group">
                                                        <a href="{{route('rekening.edit',$item->id)}}" role="button" class="btn btn-warning">Edit rekening</a>
                                                </div>
                                                <div class="col"></div>
                                                
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
                                            <div class="col-md-6 mx-auto">
                                                <div class="form-group">
                                                    <label for="">Berlaku Sampai</label>
                                                <input type="date" name="tgl_lahir" class="form-control" value="{{$item->masa_berlaku}}" disabled required  id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-auto">
                                            <div class="form-group">
                                                <a href="{{route('kartu.edit',$item->id)}}" role="button" class="btn btn-danger">Edit Kartu</a>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection