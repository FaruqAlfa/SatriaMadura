@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Tampilan Admin Data Pelaporan Barang Masuk</h2>
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
        
        <div class="col-md-7 mt-2">
            <form action="{{ route('filterByTanggalMasuk2') }}" method="POST">
                @csrf
                <div>
                    <label for="tanggal_masuk_admin">Tanggal Masuk:</label>
                    <select id="tanggal_masuk_admin" name="tanggal_masuk_admin" required>
                        <option value="">Pilih Tanggal Masuk</option>
                        @foreach ($barang_masuk as $bk)
                            <option value="{{ $bk->tanggal_masuk }}">{{ $bk->tanggal_masuk }}</option>
                        @endforeach
                    </select>
                </div>

                <a class="btn btn-warning mt-3" href="{{ route('filterByTanggalMasuk2') }}">Filter</a><br><br>
                {{-- <button type="submit">Filter</button> --}}
            </form>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nama Supplier</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Tanggal Masuk</th>
    </tr>

    @foreach ($barang_masuk as $item)
        <tr>
            <td>{{ $item->supplier->nama_supplier }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
        </tr>
    @endforeach
</table><br>

@if(isset($total_harga))
    <h2 id="total_harga">Total Harga: {{ $total_harga }}</h2>
@endif

<a class="btn btn-success mt-3" href="{{ route('lap_barang_masuk_admin') }}">Kembali</a><br><br>
@endsection