@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Tampilan Admin Data Supplier</h2>
        </div>

        <div class="col-md-6 mt-4">
            <form action="{{ url('supplier') }}" method="get">
                <input type="search" class="form-control" name ="search" value="{{Request::get('search')}}" id="inputEmail" placeholder="Search Here"><br>
                <button class="btn btn-warning mt-3" type="submit">Cari</button><br><br>
            </form>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Nama Supplier</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Telepon</th>
            </tr>
        
            @foreach ($supplier as $supplier_admin)
                <tr>
                    <td>{{ $supplier_admin->name }}</td>
                    <td>{{ $supplier_admin->nama_supplier }}</td>
                    <td>{{ $supplier_admin->username }}</td>
                    <td>{{ $supplier_admin->email }}</td>
                    <td>{{ $supplier_admin->no_telepon }}</td>
                </tr>
            @endforeach
        </table><br>

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

@endsection


