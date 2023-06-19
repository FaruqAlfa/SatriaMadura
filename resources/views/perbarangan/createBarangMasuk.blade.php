@extends('perbarangan.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Barang Masuk
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('barangmasuk.store') }}" id="myForm" enctype="multipart/form-data" >
                        @csrf
                        {{-- <div class="form-group">
                            <label for="supplier_id">supplier_id</label>
                            <input type="text" name="supplier_id" class="formcontrol" id="supplier_id" aria-describedby="supplier_id">
                        </div> --}}
                        <div class="form-group">
                            <label for="barang_id">barang_id</label>
                            <input type="barang_id" name="barang_id" class="formcontrol" id="barang_id" aria-describedby="barang_id">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">jumlah</label>
                            <input type="jumlah" name="jumlah" class="formcontrol" id="jumlah" aria-describedby="jumlah">
                        </div>
                        {{-- <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="harga" name="harga" class="formcontrol" id="harga"
                                aria-describedby="harga">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="total">total</label>
                            <input type="total" name="total" class="formcontrol" id="total"
                                aria-describedby="total">
                        </div> --}}
                        <div class="form-group">
                            <label for="tanggal_masuk">tanggal_masuk</label>
                            <input type="tanggal_masuk" name="tanggal_masuk" class="formcontrol" id="tanggal_masuk"
                                aria-describedby="tanggal_masuk">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
