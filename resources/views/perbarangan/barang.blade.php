@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Informasi Barang</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{route('inputbarang')}}">Input Barang</a>
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
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($Barang as $barang)
    <tr>
        <td>{{ $barang->id }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $barang->stok }}</td>
        <td>{{ $barang->harga }}</td>


        <td>
            <form action="{{ route('barang.destroy',$barang->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{-- {{ $Barang_Keluar->links() }} --}}
@endsection