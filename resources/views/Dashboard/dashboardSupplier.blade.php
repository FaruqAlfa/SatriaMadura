@extends('Tambah.includeSupplier')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Aktifitas Setiap Supplier</h2>
        </div>

        <div class="col-md-6 mt-4">
            <form action="{{ url('barangmasuk') }}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-warning mt-3" type="submit">Cari</button><br><br>
            </form>
        </div>

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
        {{-- <th>No</th> --}}
        <th>Nama Supplier</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal Masuk</th>
    </tr>
    @foreach ($Dashboard_Sup as $dashboard_sup)
    <tr>
        {{-- <td>{{ $barang_masuk->id }}</td> --}}
        <td>{{ $dashboard_sup->supplier->nama_supplier }}</td>
        <td>{{ $dashboard_sup->barang->nama_barang }}</td>
        <td>{{ $dashboard_sup->jumlah }}</td>
        <td>{{ $dashboard_sup->harga }}</td>
        <td>{{ $dashboard_sup->total }}</td>
        <td>{{ $dashboard_sup->tanggal_masuk }}</td>
        
    </tr>
    @endforeach
</table><br>

{{ $Dashboard_Sup->links() }}

@endsection