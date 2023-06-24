@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Tampilan Admin Data Supplier</h2>
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
        <th>Nama</th>
        <th>Nama Supplier</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Tanggal Keluar</th>
    </tr>

    @foreach ($supplier1 as $supplier)
        <tr>
            <td>{{ $supplier->name }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
    @endforeach
</table><br>

@if(isset($total_harga))
    <h2 id="total_harga">Total Harga: {{ $total_harga }}</h2>
@endif

<a class="btn btn-success mt-3" href="{{ route('lap_barang_keluar_admin') }}">Kembali</a><br><br>

@endsection


