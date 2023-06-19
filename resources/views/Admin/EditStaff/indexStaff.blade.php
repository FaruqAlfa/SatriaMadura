@extends('Admin.dashboardAdmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="position-absolute top-0 start-0">
    <h2>DAFTAR KARYAWAN</h2>
    </div>
    <div class="float-right my-2">
    <a class="btn btn-success" href="{{ route('staffCreate') }}"> Input Staff</a>
    </div>
    </div>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    
    <table class="table table-bordered">
    <tr>
    <th>Name</th>
    <th>Nama Staff</th>
    <th>Username</th>
    <th>Email</th>
    <th>No_Handphone</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($Staff as $staff)
    <tr>
    
    <td>{{ $staff->name }}</td>
    <td>{{ $staff->nama_staff }}</td>
    <td>{{ $staff->username }}</td>
    <td>{{ $staff->email }}</td>
    <td>{{ $staff->no_telpon }}</td>
    <td>
    <form action="{{ route('staff.destroy',$staff->id) }}" method="POST">
    
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    @endforeach
    </table>
@endsection