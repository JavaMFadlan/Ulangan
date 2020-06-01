@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h2 for="">Nama bank : {{$bank->nama_bank}}</h2>
                            </div>

                            <div class="form-group">
                                <h6 class="float-left m-1">Alamat bank : {{$bank->alamat_bank}}</h6>
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
                                        <label for="">Fungsi : {{$key}}</label>
                                            
                                        <label for="">Operasional : {{$value}}</label>
                                            
                                        <label for="">Kepemilikan ; {{$value}}</label>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="">Status bank : {{$bank->status_bank}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection