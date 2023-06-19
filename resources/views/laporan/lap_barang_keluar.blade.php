@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Data Pelaporan Barang Keluar</h2>
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
            <form action="{{ route('filterByTanggalKeluar') }}" method="POST">
                @csrf
                <div>
                    <label for="tanggal_keluar">Tanggal Keluar:</label>
                    <select id="tanggal_keluar" name="tanggal_keluar" required>
                        <option value="">Pilih Tanggal Keluar</option>
                        @foreach ($barang_keluar as $bk)
                            <option value="{{ $bk->tanggal_keluar }}">{{ $bk->tanggal_keluar }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-warning mt-3" type="submit">Filter</button>
            </form>

            <div class="col d-flex justify-content-end align-items-end">
                <form action="{{ route('cetakPDF1') }}" method="GET">
                    <input type="hidden" name="tanggal_keluar" value="{{$bk->tanggal_keluar}}">
                    
                    <a class="btn btn-primary mt-3 mr-3" href="{{ route('cetakPDF1') }}">CetakPDF</a>
                </form>

                <a class="btn btn-primary mt-3" href="{{ route('cetakPDF1All') }}">CetakPDFAll</a>
            </div><br>
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

<!-- pagination -->
{{-- {!! $barang_keluar->links() !!} --}}

<a class="btn btn-success mt-3" href="{{ route('lap_barang_keluar') }}">Kembali</a>
{{-- {{$barang_keluar->links()}} --}}
@endsection


