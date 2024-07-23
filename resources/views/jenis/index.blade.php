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
                <div class="card" style="border-color:#7a0099; background-color:#000000">
                    <div class="card-header text-white" style="background-color:#7a0099">
                        <div class="row">
                            <div class="col">
                                <h3>Jenis Rekening</h3>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Membuat Data</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('jenis.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Jenis Rekening</label>
                                            <input type="text" name="jenis" class="form-control" required id="">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right" id="">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mengedit</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('jenis.update','test')}}" method="post">
                                        @method('Patch')
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Jenis Rekening</label>
                                            <input type="text" name="jenis" id='rekening' class="form-control" required id="">
                                        </div>

                                        <input type="hidden" name="id" id="id">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right" id="">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Menampilkan</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('jenis.update','test')}}" method="post">
                                        @method('Patch')
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Jenis Rekening</label>
                                            <input type="text" name="jenis" id='rekening' class="form-control" disabled id="">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="background-color:#ffffff">
                        <div class="table-responsive">
                            <table id="table" class="table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenis Rekening</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($jenis as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->jenis_rekening}}</td>
                                            <td>
                                                <button role="button" class="btn btn-info text-white" data-jenis-data='{{$data->jenis_rekening}}' data-toggle="modal" data-target="#ModalShow">
                                                        Show
                                                </button>
                                                <button role="button" class="btn btn-warning text-white" data-iddata='{{$data->id}}' data-jenis-data='{{$data->jenis_rekening}}' data-toggle="modal" data-target="#ModalEdit">
                                                        Edit
                                                </button>
                                                <form action="{{ route('jenis.destroy',$data->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input class="btn btn-danger" type="submit" value="Hapus">
                                                </form>

                                                {{-- <a href="{{route('jenis.destroy',$dat  a->id)}}"> Hapus</a> --}}
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
<script>
        $('#ModalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var jenis = button.data('jenis-data')
    var id = button.data('iddata')
    var modal = $(this)
    modal.find('.modal-body #rekening').val(jenis);
    modal.find('.modal-body #id').val(id);
    })

    $('#ModalShow').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var jenis = button.data('jenis-data')
    var modal = $(this)
    modal.find('.modal-body #rekening').val(jenis);
    })
</script>
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
