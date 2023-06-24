@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">BARANG KELUAR PERBARANGAN</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{route('barangkeluar.create')}}">Input Barang</a>
        </div>
        <div class="col-md-6 mt-4">
            <form action="{{ url('barangkeluar')}}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-warning mt-3" type="submit">Cari</button><br><br>
            </form>
        </div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

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
        <th>Nama Staff</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal keluar</th>
        <th width="150px">Action</th>
    </tr>
    @foreach ($Barang_Keluar as $barang_keluar)
    <tr>
        <td>{{ $barang_keluar->id }}</td>
        <td>{{ $barang_keluar->staff->nama_staff }}</td>
        <td>{{ $barang_keluar->barang->nama_barang }}</td>
        <td>{{ $barang_keluar->jumlah }}</td>
        <td>{{ $barang_keluar->harga }}</td>
        <td>{{ $barang_keluar->total }}</td>
        <td>{{ $barang_keluar->tanggal_keluar }}</td>

        <td>
            <form action="{{ route('barangkeluar.destroy',$barang_keluar->id)}}" method="POST">
                <a class="btn btn-info" href="{{route('barangkeluar.show',$barang_keluar->id)}}">Show</a>
                <a class="btn btn-primary" href="{{ route('barangkeluar.edit',$barang_keluar->id) }}">Edit</a>
            </form>
        </td>
    </tr>
    @endforeach

</table><br>

@if(isset($total_harga1))
    <h2 id="total_harga1">Total Harga: {{ $total_harga1 }}</h2><br><br>
@endif

</table>
{{ $Barang_Keluar->links() }}

@endsection