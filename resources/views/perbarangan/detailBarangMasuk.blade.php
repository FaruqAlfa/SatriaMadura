@extends('perbarangan.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Barang Masuk
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama Supplier: </b>{{ $barang_masuk->supplier->nama_supplier }}</li>
                        <li class="list-group-item"><b>Nama Barang: </b>{{ $barang_masuk->barang->nama_barang }}</li>
                        <li class="list-group-item"><b>Jumlah: </b>{{ $barang_masuk->jumlah }}</li>
                        <li class="list-group-item"><b>Harga: </b>{{ $barang_masuk->harga}}</li>
                        <li class="list-group-item"><b>Total: </b>{{ $barang_masuk->total }}</li>
                        <li class="list-group-item"><b>Tanggal Masuk: </b>{{ $barang_masuk->tanggal_masuk }}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt3" href="{{ route('barangmasuk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
