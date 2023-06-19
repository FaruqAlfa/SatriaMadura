@extends('Dashboard.dashboardStaff')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Staff
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>> There were some problems with your i
                        nput.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('staff.store') }}" id="myform">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" name="name" class="form-control" id="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="nama_staff">Nama Staff</label>
                            <input type="nama_staff" name="nama_staff" class="form-control" id="nama_staff" aria-describedby="nama_staff">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" name="username" class="form-control" id="username" aria-describedby="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection