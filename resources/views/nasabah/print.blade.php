<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nasabah - {{date('Y-m-d')}}</title>
    <style>
        body {
            font-size: 12px;
            margin-left: 50px;
            margin-right: 50px;
        }
        .big{
            height: 100px;
        }
        .small{
            height: 80px;
        }

        #header {
            margin: auto;
            width: 50%;
            /* border: 1px solid black; */
            text-align: center;
        }

        .h1-header{
            color: red;
            margin-top: 0px;
            margin-left: 4px;
            margin-bottom: -10px;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .list-fasilitas-kredit{
            margin-top: 0px;
            margin-left: -27px;
        }

        #header h4 {
            margin: 5px;
        }

        table td {
            vertical-align: top;
        }

        .nowrap {
            white-space: nowrap;
        }

        #table13,
        #table13 td,
            {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            vertical-align: middle;
        }

        ol {
            margin: 0;
        }

        table#ttd1,
        table#ttd2 {
            text-align: center;
            margin: auto;
        }

        div.divTable {
            margin-left: 3px;
        }

        .page-break {
            page-break-before: always;
        }

        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 50px;
            right: 50px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 50px;
            right: 50px;
            height: 150px;
        }

        .header-left {
            width: 75%;
            float: left;
        }

        .header-left table,
        .header-left td {
            margin: 0;
            padding: 0;
        }

        .header-right {
            float: right;
            border: 1px solid black;
            padding: 3px;
        }

        header {
            font-size: 10px;
        }

        .header-right table,
        .header-right td {
            /*border: 1px solid black;*/
            /*border-collapse: collapse;*/
        }

        .tabel_border {
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .arrow {
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
        }

        .right {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        .left {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .up {
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
        }

        .down {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }
    </style>
</head>

<body>

    <header>
     <br><b><h1 style="text-align:center;">Data Nasabah</h1></b>
    </header>
    <br>
    <table width="100%" style="border-collapse: collapse; text-align: center" border="1px">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Pekerjaan</th>
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
                    <td>{{$data->tgl_lahir}}</td>
                    <td>{{$data->pekerjaan}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

</body>

</html>
