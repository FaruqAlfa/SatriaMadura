@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Tampilan Admin Data Karyawan</h2>
        </div><br>

        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
        
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Nama Staff</th>
        <th>Username</th>
        <th>Email</th>
        <th>No Telepon</th>
    </tr>

    @foreach ($staff as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->nama_staff }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->no_telepon }}</td>
        </tr>
    @endforeach
</table><br>

@endsection


