@extends('perbarangan.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2 style="text-align: center">Data Pelaporan Barang Keluar</h2>
        </div><br>

        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
        
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nama Staff</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Tanggal Keluar</th>
    </tr>

    @foreach ($lap_barang_keluar as $item)
        <tr>
            <td>{{ $item->staff->nama_staff }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
    @endforeach
</table>
{{-- {{$Barang_keluar->links()}} --}}
@endsection