@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Tampilan Admin Barang Keluar</h2>
        </div><br>

        <div class="col-md-6 mt-4">
            <form action="{{ url('barang_keluar_admin')}}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-warning" type="submit">Cari</button><br><br>
            </form>
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
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal keluar</th>
    </tr>

    @foreach ($barang_keluar1 as $item)
        <tr>
            <td>{{ $item->nama_staff }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
    @endforeach
</table><br>

@if(isset($total_harga1))
    <h2 id="total_harga1">Total Harga: {{ $total_harga1 }}</h2><br>
@endif

<a class="btn btn-success mt-3" href="{{ route('barang_keluar_admin') }}">Kembali</a><br><br>

@endsection