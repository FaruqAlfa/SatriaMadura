@extends('perbarangan.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Barang
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
                    <form method="post" action="{{ route('makebarang') }}" id="myForm" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama_barang">nama_barang</label>
                            <input type="nama_barang" name="nama_barang" class="formcontrol" id="nama_barang" aria-describedby="nama_barang">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="stok">stok</label>
                            <input type="stok" name="stok" class="formcontrol" id="stok" aria-describedby="stok">
                        </div>
                        
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="harga" name="harga" class="formcontrol" id="harga"
                                aria-describedby="harga">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
