@extends('perbarangan.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Barang Keluar
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama Staff: </b>{{ $barang_keluar->staff->nama_staff }}</li>
                        <li class="list-group-item"><b>Nama Barang:</b>{{ $barang_keluar->barang->nama_barang }}</li>
                        <li class="list-group-item"><b>Jumlah:</b>{{ $barang_keluar->jumlah }}</li>
                        <li class="list-group-item"><b>Harga: </b>{{ $barang_keluar->harga}}</li>
                        <li class="list-group-item"><b>Total: </b>{{ $barang_keluar->total }}</li>
                        <li class="list-group-item"><b>Tanggal keluar: </b>{{ $barang_keluar->tanggal_keluar }}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt3" href="{{ route('barangkeluar.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
