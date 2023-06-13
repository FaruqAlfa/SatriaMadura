@extends('perbarangan.layout')

@section('content')

<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
         <div class="card-header">
            Edit Barang Keluar
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
         <form method="post" action="{{ route('barangkeluar.update', $barang_keluar->id) }}" id="myForm">
         @csrf
         @method('PUT')
            <div class="form-group">
               <label for="jumlah">jumlah</label>
               <input type="text" name="jumlah" class="formcontrol" id="jumlah"value="{{ $barang_keluar->jumlah }}" ariadescribedby="jumlah">
            </div>
            {{-- <div class="form-group">
               <label for="nama">nama</label>
               <input type="text" name="nama" class="formcontrol" id="nama"value="{{ $Mahasiswa->nama }}" ariadescribedby="nama">
            </div>
            <div class="form-group">
               <label for="kelas">kelas</label>
               <input type="kelas" name="kelas" class="formcontrol" id="kelas"value="{{ $Mahasiswa->kelas }}" ariadescribedby="kelas">
            </div>
            <div class="form-group">
               <label for="jurusan">jurusan</label>
               <input type="jurusan" name="jurusan" class="formcontrol" id="jurusan"value="{{ $Mahasiswa->jurusan }}" ariadescribedby="jurusan">
            </div>
            <div class="form-group">
               <label for="no_handphone">no_handphone</label>
               <input type="no_handphone" name="no_handphone" class="formcontrol" id="no_handphone"value="{{ $Mahasiswa->no_handphone }}" ariadescribedby="no_handphone">
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success mt-3" href="{{ route('barangkeluar.index') }}">Kembali</a>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection
