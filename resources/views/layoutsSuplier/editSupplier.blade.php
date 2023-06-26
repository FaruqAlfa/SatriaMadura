@extends('Tambah.includeSupplier')

@section('content')
        <div class="container mt-5 h-100 row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header" >
                    <center>
                        Edit Supplier
                    </center>
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
                    <form method="post" action="{{ route('updateSup', $supplier->id) }} id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label> 
                            <input type="text" name="name" class="form-control" id="name" value="{{ $supplier->name }}" aria-describedby="name" > 
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label> 
                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" value="{{ $supplier->nama_supplier }}" aria-describedby="nama_supplier" > 
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label> 
                            <input type="username" name="username" class="form-control" id="username" value="{{ $supplier->username }}" aria-describedby="username" > 
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label> 
                            <input type="email" name="email" class="form-control" id="email" value="{{ $supplier->email }}" aria-describedby="email" > 
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label> 
                            <input type="password" name="password" class="form-control" id="password"  aria-describedby="password" > 
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No. Hanphone</label> 
                            <input type="no_telepon" name="no_telepon" class="form-control" id="no_telepon" value="{{ $supplier->no_telepon }}" aria-describedby="no_telepon" > 
                        </div>

                        <div class="form-group">
                            <label for="image">Feature Image</label>
                            <input type="file" class="form-control" required="required" name="image" value="{{$supplier->image}}"></br>
                            {{-- <img width="150px" src="{{asset('storage/'.$Staff->image)}}"> --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{-- <a href="{{ route('dashboardSupplier') }}"class="btn btn-primary">Kembali</a>  --}}
                    </form>
                </div>
            </div>
        </div>
@endsection