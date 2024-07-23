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
                <div class="card border-success">
                    <div class="card-header bg-success">
                        <div class="row">
                            <div class="col-8">
                                <h3>Data nasabah</h3>
                            </div>
                            <div class="col">
                                <div class="row float-right">
                                    <div class="col-8">
                                        <a href="{{route('nasabah.create')}}" class="float btn btn-dark">
                                        Tambah Data
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{route('nasabah.pdf')}}" method="post">
                                            @csrf
                                            <input type="submit" class="float-right btn btn-dark" value="PDF">
                                        </form>
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
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomor Pegawai</th>
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
                                                <td>
                                                    <ul class=" list-unstyled">
                                                        @foreach ($data->pegawai as $item)
                                                            <li>{{$item->no_pegawai}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
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
        });
    </script>
@endsection
