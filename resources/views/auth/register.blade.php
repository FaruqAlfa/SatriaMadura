@extends('layouts')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="img/logoPT.png"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('postregister') }}">
              @csrf
              @method('POST')
              <!-- Name input -->
              <div class="form-outline mb-4">
                <label class="name" for="name">Name</label>
                  <input type="name" id="name" name="name" class="form-control form-control-lg"
                    placeholder="Masukkan Nama Anda" />
                </div>

                <!-- Supplier Name input -->
              <div class="form-outline mb-4">
                <label class="name" for="name">Nama Supplier</label>
                <input type="nama_supplier" id="nama_supplier" name="nama_supplier" class="form-control form-control-lg"
                  placeholder="Masukkan Nama Supplier" />
              </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
              <label class="username" for="username">Username</label>
              <input type="username" id="username" name="username" class="form-control form-control-lg"
                placeholder="Masukkan Username yang Pasti" />
            </div>


              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="email" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg"
                  placeholder="Masukkan E-mail Anda" />
              </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="password" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg"
                placeholder="Masukkan password" />
            </div>       
            
             <!-- Nomor Telepon input -->
             <div class="form-outline mb-3">
               <label class="no_telepon" for="no_telepon">Nomor Telepon</label>
              <input type="no_telepon" id="no_telepon" name="no_telepon" class="form-control form-control-lg"
                placeholder="Masukkan Nomor Telepon" />
            </div>       
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <a href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Back</button></a>
                <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </section>
    
@endsection