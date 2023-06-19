@extends('Tambah.includeSupplier')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-5">
            <h2 style="text-align: center">Tampilan Admin Data Supplier</h2>
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
</div>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Nama Supplier</th>
        <th>Username</th>
        <th>Email</th>
        <th>No Telepon</th>
    </tr>

    @foreach ($supplier1 as $supplier_admin)
        <tr>
            <td>{{ $supplier_admin->name }}</td>
            <td>{{ $supplier_admin->nama_supplier }}</td>
            <td>{{ $supplier_admin->username }}</td>
            <td>{{ $supplier_admin->email }}</td>
            <td>{{ $supplier_admin->no_telepon }}</td>
        </tr>
    @endforeach
</table><br>

@endsection


