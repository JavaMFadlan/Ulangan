@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                        Data nasabah
                    <a href="{{route('nasabah.create')}}" class="float-right">
                    Tambah Data
                    </a>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Nomor Rekening</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($nasabah as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->alamat}}</td>
                                                <td>{{$data->no_telepon}}</td>
                                                <td>
                                                    <ul class=" list-unstyled">
                                                        @foreach ($data->rekening as $item)
                                                            <li>{{$item->no_rekening}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <form action="{{ route('nasabah.destroy',$data->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{route('nasabah.show',$data->id)}}" role="button" class="btn btn-success"> Lihat </a>
                                                        <a href="{{route('nasabah.edit',$data->id)}}" role="button" class="btn btn-warning"> Edit </a>
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
                                {{$nasabah->links()}}
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
        drawCallBack: function (params) {
            $('.dt-search-0').addClass('text-white');
        }
    });
    </script>
@endsection
