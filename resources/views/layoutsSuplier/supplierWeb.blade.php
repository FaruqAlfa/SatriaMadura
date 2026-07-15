@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Tampilan Data Staff Barang Masuk</h2>
        </div>

        <div class="col-md-6 mt-4">
            <form action="{{ url('supplierWeb') }}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-warning mt-3" type="submit">Cari</button><br><br>
            </form>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nama Supplier</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Tanggal Masuk</th>
            </tr>
        
            @foreach ($Barang_Masuk_Sup as $barang_masuk_sup)
                <tr>
                    <td>{{ $barang_masuk_sup->supplier->nama_supplier }}</td>
                    <td>{{ $barang_masuk_sup->barang->nama_barang }}</td>
                    <td>{{ $barang_masuk_sup->jumlah }}</td>
                    <td>{{ $barang_masuk_sup->harga }}</td>
                    <td>{{ $barang_masuk_sup->total }}</td>
                    <td>{{ $barang_masuk_sup->tanggal_masuk }}</td>
                </tr>
            @endforeach
        </table><br>

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

        <a class="btn btn-success mt-3" href="{{ route('supplierWeb') }}">Kembali</a><br><br>

        </div>
    </div>
</div>

{{ $Barang_Masuk_Sup->links() }}

@endsection


