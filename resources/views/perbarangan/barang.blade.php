@extends('Tambah.includeStaff')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Informasi Barang</h2><br>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{route('inputbarang')}}">Input Barang</a><br>
        </div>

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
        <th>No</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga</th>
        <th width="150px">Action</th>
    </tr>
    @foreach ($Barang as $barang)
    <tr>
        <td>{{ $barang->id }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $barang->stok }}</td>
        <td>{{ $barang->harga }}</td>


        <td>
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
                            Apakah Anda yakin ingin menghapus Barang ini?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('deletebarang', $barang->id) }}" method="POST">
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
</table><br>

<a class="btn btn-success mt-3" href="{{ route('dashboardStaff') }}">Kembali</a><br><br>
{{-- {{ $Barang_Keluar->links() }} --}}
@endsection