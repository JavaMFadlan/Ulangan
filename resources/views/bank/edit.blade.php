@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Ubah Data</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bank.update',$bank->id)}}" method="post">
                            @method('Patch')
                            @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama bank</label>
                                    <input type="text" name="nama" class="form-control" required id="" value="{{$bank->nama_bank}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="float-left m-1">Alamat bank</label>
                                    <input type="text" value="{{$bank->alamat_bank}}" name="alamat_bank" class="form-control" required id="" value="{{$bank->nama_bank}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-auto">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4>Jenis bank</h4><br>
                                            <?php 
                                                $array =explode(",",$bank->jenis_bank);
                                                foreach ($array as $key => $value) {
                                                }
                                            ?>
                                            <label for="">Fungsi</label>
                                                <select class="custom-select" name="fungsi">
                                                    <option <?php if ($key[0] == 'Sentral' ) echo 'selected' ; ?> value="Sentral">Sentral</option>
                                                    <option <?php if ($key[0] == 'umum' ) echo 'selected' ; ?>value="umum">Umum</option>
                                                    <option <?php if ($key[0] == 'BPR' ) echo 'selected' ; ?>value="BPR">Perkreditan Rakyat</option>
                                                </select>

                                            <label for="">Operasional</label>
                                                <select class="custom-select" name="operasi">
                                                    <option <?php if ($key[1] == 'Konvesional' ) echo 'selected' ; ?> value="Konvesional">Konvesional</option>
                                                    <option <?php if ($key[1] == 'Syariah' ) echo 'selected' ; ?> value="Syariah">Syariah</option>
                                                </select>

                                            <label for="">Kepemilikan</label>
                                                <select class="custom-select" name="kepemilikan">
                                                    <option <?php if ($key[2] == 'Pemerintah' ) echo 'selected' ; ?> value="Pemerintah">Pemerintah</option>
                                                    <option <?php if ($key[2] == 'Swasta Nasional' ) echo 'selected' ; ?> value="Swasta Nasional">Swasta Nasional</option>
                                                    <option <?php if ($key[2] == 'Koperasi' ) echo 'selected' ; ?> value="Koperasi">Koperasi</option>
                                                </select>
                                        </div>
                                        <div class="card-footer text-center">
                                                <div class="form-group">
                                                    <h4 for="">Status bank</h4>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Devisa" <?php if ($bank->status_bank == 'Devisa' ) echo 'checked' ; ?>>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Devisa
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="Non-Devisa" <?php if ($bank->status_bank == 'Non-Devisa' ) echo 'checked' ; ?>>
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Non-Devisa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection