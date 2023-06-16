@extends('perbarangan.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Data Pelaporan Barang Masuk</h2>
        </div><br>
        
        <div class="col-md-7 mt-2">
            <form action="{{ route('filterByTanggalMasuk') }}" method="POST">
                @csrf
                <div>
                    <label for="tanggal_masuk">Tanggal Masuk:</label>
                    <select id="tanggal_masuk" name="tanggal_masuk" required>
                        <option value="">Pilih Tanggal Masuk</option>
                        @foreach ($barang_masuk as $bk)
                            <option value="{{ $bk->tanggal_masuk }}">{{ $bk->tanggal_masuk }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Filter</button>
            </form>

            <div class="col d-flex justify-content-end align-items-end">
                <form action="{{ route('cetakPDF2') }}" method="GET">
                    <input type="hidden" name="tanggal_masuk" value="{{$bk->tanggal_masuk}}">
                    <button type="submit">
                        <a class="btn btn-primary mt-3">CetakPDF</a>
                    </button>
                </form>

                <a class="btn btn-primary mt-3" href="{{ route('cetakPDF2All') }}">CetakPDFAll</a>
            </div><br>
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
</table>

<a class="btn btn-success mt-3" href="{{ route('lap_barang_masuk') }}">Kembali</a>
{{-- {{$Barang_masuk->links()}} --}}
@endsection