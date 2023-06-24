@extends('Tambah.includeAdmin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Tampilan Admin Data Karyawan</h2>
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
    
    <div class="row">
        <div class="col-md-4">
          <form class="d-flex"  action="{{ route('search') }}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    <table class="table table-bordered">
    <tr>
    <th>Name</th>
    <th>Nama Staff</th>
    <th>Username</th>
    <th>Image</th>
    <th>Email</th>
    <th>No_Handphone</th>
    <th width="150px">Action</th>
    </tr>
    @foreach ($Staff as $staff)
    <tr>
    
    <td>{{ $staff->name }}</td>
    <td>{{ $staff->nama_staff }}</td>
    <td>{{ $staff->username }}</td>
    <td><img width="100px" src="{{asset('storage/'.$staff->image)}}"></td>
    <td>{{ $staff->email }}</td>
    <td>{{ $staff->no_telepon }}</td>
    <td>

        <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        Delete
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">KONFIRMASI DELETE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Apakah Anda yakin ingin menghapus karyawan ini?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('deleteStaff', $staff->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    </td>
    </tr>
    @endforeach
    </table>

    {{-- {{ $Staff->links() }} --}}

@endsection