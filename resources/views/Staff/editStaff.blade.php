@extends('Tambah.includeStaff')

@section('content')
        <div class="container mt-5 h-100 row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header" >
                    <center>
                        Edit Staff
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
                    <form method="post" action="{{ route('update', $Staff->id) }} id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kategori">Kategori</label> 
                            <input type="text" name="kategori" class="form-control" id="kategori" value="{{ $Staff->kategori }}" aria-describedby="kategori" > 
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_staff">Nama Staff</label> 
                            <input type="text" name="nama_staff" class="form-control" id="nama_staff" value="{{ $Staff->nama_staff }}" aria-describedby="nama_staff" > 
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label> 
                            <input type="username" name="username" class="form-control" id="username" value="{{ $Staff->username }}" aria-describedby="username" > 
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label> 
                            <input type="email" name="email" class="form-control" id="email" value="{{ $Staff->email }}" aria-describedby="email" > 
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label> 
                            <input type="password" name="password" class="form-control" id="password"  aria-describedby="password" > 
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No. Hanphone</label> 
                            <input type="no_telepon" name="no_telepon" class="form-control" id="no_telepon" value="{{ $Staff->no_telepon }}" aria-describedby="no_telepon" > 
                        </div>

                        <div class="form-group">
                            <label for="image">Feature Image</label>
                            <input type="file" class="form-control"  name="image" value="{{$Staff->image}}"></br>
                            {{-- <img width="150px" src="{{asset('storage/'.$Staff->image)}}"> --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('dashboardStaff') }}"class="btn btn-primary">Kembali</a> 
                    </form>
                </div>
            </div>
        </div>
@endsection