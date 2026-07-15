@extends('perbarangan.layout')

@section('content')

<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
         <div class="card-header">
            Edit Barang Masuk
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
         <form method="post" action="{{ route('updateBarang', $barang_masuk->id) }}" id="myForm">
         @csrf
         @method('PUT')
            <div class="form-group">
               <label for="jumlah">jumlah</label>
               <input type="text" name="jumlah" class="formcontrol" id="jumlah"value="{{ $barang_masuk->jumlah }}" ariadescribedby="jumlah">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success mt-3" href="{{ route('barangMasukSup') }}">Kembali</a>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection
