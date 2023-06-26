@extends('perbarangan.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Barang Keluar
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
                    <form method="post" action="{{ route('barangkeluar.store') }}" id="myForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="staff_id">staff_id</label>
                            <input type="text" name="staff_id" class="form-control" id="staff_id" aria-describedby="staff_id">
                        </div>

                        <div class="form-group">
                            <label for="barang_id">barang_id</label>
                            <input type="barang_id" name="barang_id" class="form-control" id="barang_id" aria-describedby="barang_id">
                        </div>
                        
                        <div class="form-group">
                            <label for="jumlah">jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah">
                        </div>
                        {{-- <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="harga" name="harga" class="form-control" id="harga" aria-describedby="harga">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="total">total</label>
                            <input type="total" name="total" class="form-control" id="total"
                                aria-describedby="total">
                        </div> --}}
                        <div class="form-group">
                            <label for="tanggal_keluar">tanggal_keluar</label>
                            <input type="tanggal_keluar" name="tanggal_keluar" class="form-control" id="tanggal_keluar"
                                aria-describedby="tanggal_keluar">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
