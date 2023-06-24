@extends('Tambah.includeSupplier')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <section class="">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-start align-items-center h-100">
                <div class="col col-lg-12 mb-4 mb-lg-0">
                  <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                      <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; border-radius: 50%">
                        <img src="{{ asset('storage/'.$supplier->image) }}"
                          alt="image" class="img-fluid my-5" style="width: 200px; border-radius: 50%" />
                        <i class="far fa-edit mb-5"></i>
                      </div>
                      
                      <div class="col-md">
                        <div class="card-body p-4 mt-5">
                          <h6>Information</h6>
                          <h5>{{ $supplier->nama_supplier}}</h5>
                          <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-6 mb-3">
                              <h6>Email:  {{ $supplier->email}}</h6>
                              
                              {{-- {{ dd($supplier) }} --}}
                              {{-- <p class="text-muted">{{ $supplier->email ? $supplier->email : 'No email available' }}</p> --}}
                            </div>
                            <div class="col-6 mb-3">
                              <h6>Phone: {{ $supplier->no_telepon}}</h6>
                              {{-- <p class="text-muted">{{ $supplier->no_telepon }}</p> --}}
                            </div>
                          </div>
                          <h6>Username: {{ $supplier->username }}</h6>
                          <hr class="mt-0 mb-4">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- @dd(request()->route()->getName()) --}}
                @if (request()->route()->getName() !== "showDetailSupplier")         
                    <div class="row justify-content-end items-center">
                        <div class="col-12">
                            <a href="{{ route('edit', ['id' => Auth::id()]) }}" class="btn btn-warning">Edit Profile</a>
                        </div>
                    </div>
                @endif
              </div>
            </div>
          </section>
    </div>
</div>

@endsection