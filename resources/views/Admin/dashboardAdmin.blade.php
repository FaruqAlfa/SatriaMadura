@extends('Tambah.includeAdmin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Welcome Admin {{ Auth::user()->name }}</h2>
        </div>
        
    </div>
</div>

@endsection