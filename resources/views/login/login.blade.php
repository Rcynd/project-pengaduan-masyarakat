@extends('login.layout.main')
@section('container')
<div class="card col-lg-9 rounded-4 h-login p-0 " style="margin-top: 11%">

<div class=" d-flex justify-content-center">
  <div class="">
    @if (session()->has('loginError'))
<div class="d-flex justify-content-center">
<div class="alert alert-danger alert-dismissible fade show text-center " role="alert">
  {{ session('loginError') }}
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
</div>
@endif
@if (session()->has('sukses'))
<div class="d-flex justify-content-center">
<div class="alert alert-success alert-dismissible fade show text-center " role="alert">
  {{ session('sukses') }}
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
</div>
@endif
  </div>
  <main class="col-lg-7 rounded-0 p-4 bg-merah d-flex justify-content-between align-items-end">
    <div class="col-lg-7 justify-content-center">
      <div class=" fw-normal text-center h3 mb-4 p-2 text-light">
        Login Aduken
      </div>
            <form action="/login" method="post" enctype="multipart/form-data">
              @csrf
              
              <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control rounded-pill @error('username') is-invalid   @enderror" id="username" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control rounded-pill" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <input id="submin" type="submit" value="" style="background-color: rgba(0,0,0,0); border: none;z-index:-99909; position:absolute;">
              <label for="submin" type="submit" style="text-decoration: none; width:100%;" class="fw-normal text-center rounded-0 m-0 mt-4 pt-0 pb-0 text-dark" >
                <p class="p-0 m-0 bg-hitam rounded-pill btnku p-2 shadow-md"> Log in</p> 
              </label>
            </form>
          </div>
          <div class="col-lg-4 ">
            <p class="text-center m-0 mb-3 p-0">
              <img src="{{ asset('') }}adminlte/img/boxed-bg.png" width="50%" class="img-fluid img-sm mb-4 rounded-circle" alt="">
            </p>
            <a href="{{ asset('') }}register" style="text-decoration: none" class="fw-normal text-center rounded-0 m-0 mt-4 pt-0 pb-0 text-dark">
              <p class="p-0 m-0 bg-hitam rounded-pill btnku p-2 shadow-md"> Registrasi Akun</p> 
            </a>
          </div>
    </main>
    <div class="">
      @if (session()->has('loginEmpty'))
<div class="d-flex justify-content-center">
  <div class="alert alert-danger alert-dismissible fade show text-center " role="alert">
    {{ session('loginEmpty') }}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
</div>
@endif
@if (session()->has('sukses'))
<div class="d-flex justify-content-center">
  <div class="alert alert-success alert-dismissible fade show text-center " role="alert">
    {{ session('sukses') }}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
</div>
@endif
    </div>
</div>

</div>
@endsection