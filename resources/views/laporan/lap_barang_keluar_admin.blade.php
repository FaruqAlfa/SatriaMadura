@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Tampilan Admin Data Pelaporan Barang Keluar</h2>
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
            <form action="{{ route('filterByTanggalKeluar2') }}" method="POST">
                @csrf
                <div>
                    <label for="tanggal_keluar_admin">Tanggal Keluar:</label>
                    <select id="tanggal_keluar_admin" name="tanggal_keluar_admin" required>
                        <option value="">Pilih Tanggal Keluar</option>
                        @foreach ($barang_keluar as $bk)
                            <option value="{{ $bk->tanggal_keluar }}">{{ $bk->tanggal_keluar }}</option>
                        @endforeach
                    </select>
                </div>

                <a class="btn btn-warning mt-3" href="{{ route('filterByTanggalKeluar2') }}">Filter</a><br><br>
                {{-- <button type="submit">Filter</button> --}}
            </form>

        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nama Staff</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Tanggal Keluar</th>
    </tr>

    @foreach ($barang_keluar as $item)
        <tr>
            <td>{{ $item->staff->nama_staff }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->tanggal_keluar }}</td>
        </tr>
    @endforeach
</table><br>

@if(isset($total_harga))
    <h2 id="total_harga">Total Harga: {{ $total_harga }}</h2>
@endif

<a class="btn btn-success mt-3" href="{{ route('lap_barang_keluar_admin') }}">Kembali</a><br><br>

@endsection


