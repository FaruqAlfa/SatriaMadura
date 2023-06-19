@extends('perbarangan.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2 style="text-align: center">Data Pelaporan Barang Masuk</h2>
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
        
        <div class="col-md-6 mt-3">
            {{-- <form method="POST" action="{{ route('lap_barang_keluar.filter') }}">
                @csrf
                <div class="form-group">
                    <label for="tanggal_keluar">Filter berdasarkan Tanggal keluar:</label>
                    <select name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                        <option value="">Pilih Tanggal keluar</option>
                        @foreach ($dates as $date)
                            <option value="{{ $date }}"{{ old('tanggal_masuk') == $tanggal ? 'selected' : '' }}>
                                {{ Carbon::parse($tanggal)->format('Y-m-d') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form> --}}
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

    @foreach ($lap_barang_masuk as $item)
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

{{-- {{$Barang_masuk->links()}} --}}
@endsection