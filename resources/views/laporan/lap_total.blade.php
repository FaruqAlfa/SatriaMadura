@extends('Tambah.incudeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Data Pelaporan Barang</h2>
        </div><br>

        <div>
            <a class="btn btn-success mt-3" href="{{ route('lap_barang_masuk') }}">Laporan Barang Masuk</a>
            <a class="btn btn-success mt-3" href="{{ route('lap_barang_keluar') }}">Laporan Barang Keluar</a>
        </div>xx
    </div>
</div>


@endsection


