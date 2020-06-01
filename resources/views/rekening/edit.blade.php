@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-center">
                        <h3>Data Rekening</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('rekening.update',$rekening->id)}}" method="post">@csrf @method('Put')
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">No Rekening</label>
                                        <input type="text" name="no_rekening" class="form-control" value="{{$rekening->no_rekening}}" disabled required id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">No Kartu</label>
                                        <input type="text" name="no_kartu" class="form-control" value="{{$kartu->no_kartu}}" disabled required  id="">
                                    </div>
                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">Saldo</label>
                                        <input type="number" maxlength="12" min="0" name="saldo" class="form-control" value="{{$rekening->saldo}}"required  id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Berlaku Sampai</label>
                                    <input type="date" name="masa_berlaku" class="form-control" value="{{$rekening->masa_pakai}}" required  id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <label class=" ">Status</label><br>
                                        <input name="aktif" type="checkbox" <?php if ($rekening->aktif == 'aktif') echo 'checked' ; ?> value="aktif">
                                        <label class=" ">Aktif</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Jenis Kartu</label>
                                    <select name="jenis_rekening" class=" custom-select" id="">
                                        @foreach ($jenis as $data)
                                            <option <?php if ($rekening->id_jenis == $data->id) echo 'selected' ; ?> value="{{$data->id}}">{{$data->jenis_rekening}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-lg btn-warning m-auto float-right" value="Edit">
                        </form>
                        <div class="form-group">
                            <form action="{{ route('rekening.destroy',$rekening->id)}}" method="post">
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
@endsection