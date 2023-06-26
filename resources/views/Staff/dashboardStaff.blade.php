@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Aktifitas Setiap Staff</h2>
        </div>

        <div class="col-md-6 mt-4">
            <form action="{{ url('barangkeluar') }}" method="get">
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
        <th>Nama Staff</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal Keluar</th>
    </tr>
    @foreach ($Staff as $staffDash)
    <tr>
        {{-- <td>{{ $barang_masuk->id }}</td> --}}
        <td>{{ $staffDash->staff->nama_staff }}</td>
        <td>{{ $staffDash->barang->nama_barang }}</td>
        <td>{{ $staffDash->jumlah }}</td>
        <td>{{ $staffDash->harga }}</td>
        <td>{{ $staffDash->total }}</td>
        <td>{{ $staffDash->tanggal_keluar }}</td>
        
    </tr>
    @endforeach
</table><br>

<a class="btn btn-success mt-3" href="{{ route('dashboardStaff') }}">Kembali</a><br><br>
{{ $Staff->links() }}

@endsection

