@extends('Tambah.includeSupplier')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">BARANG MASUK PERBARANGAN</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success " href="{{route('barangmasuk.create')}}">Input Barang</a>
        </div>
        <div class="col-md-6 mt-4">
            <form action="{{ url('barang_masuk') }}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-secondary" type="submit">Cari</button><br><br>
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
        <th>No</th>
        <th>Nama Supplier</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal Masuk</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($Barang_Masuk as $barang_masuk)
    <tr>
        <td>{{ $barang_masuk->id }}</td>
        <td>{{ $barang_masuk->supplier->nama_supplier }}</td>
        <td>{{ $barang_masuk->barang->nama_barang }}</td>
        <td>{{ $barang_masuk->jumlah }}</td>
        <td>{{ $barang_masuk->harga }}</td>
        <td>{{ $barang_masuk->total }}</td>
        <td>{{ $barang_masuk->tanggal_masuk }}</td>
        <td>
            <form action="{{ route('barangmasuk.destroy',$barang_masuk->id)}}" method="POST">
                <a class="btn btn-info" href="{{route('barangmasuk.show',$barang_masuk->id)}}">Show</a>
                <a class="btn btn-primary" href="{{ route('barangmasuk.edit',$barang_masuk->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
</table><br>

{{-- {{ $barang_masuk->links() }} --}}
@if(isset($total_harga2))
    <h2 id="total_harga2">Total Harga: {{ $total_harga2 }}</h2><br><br>
@endif

@endsection