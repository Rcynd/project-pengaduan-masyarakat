@extends('login.layout.main')
@section('container')
<div class="card col-lg-9 rounded-4 bg-hitam p-0 " style="margin-top: .2%;margin-bottom:.2%;">

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
    {{-- <div class="col-lg-4 ">
      <p class="text-center m-0 mb-3 p-0">
        <img src="{{ asset('') }}adminlte/img/boxed-bg.png" width="50%" class="img-fluid img-sm mb-4 rounded-circle" alt="">
      </p>
      <a href="{{ asset('') }}register" style="text-decoration: none" class="fw-normal text-center rounded-0 m-0 mt-4 pt-0 pb-0 text-light">
        <p class="p-0 m-0 bg-hitam rounded-pill btnku p-2 shadow-md"> Login Aduken</p> 
      </a>
    </div> --}}
    <div class="col-lg-12 justify-content-center">
      <div class=" fw-normal text-center h3 mb-4 p-2 text-light">
        Registrasi Aduken
      </div>
      <form action="/register" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-floating mt-3">
          <input type="text" name="nik" class="form-control rounded-pill @error('nik') is-invalid   @enderror" id="nik" placeholder="name@example.com" value="{{ old('nik') }}" autofocus required>
          <label for="nik">NIK</label>
          @error('nik')
          <div class="text-warning text-center">
            {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="text" name="nama" class="form-control rounded-pill @error('nama') is-invalid   @enderror" id="nama" placeholder="name@example.com" value="{{ old('nama') }}" autofocus required>
          <label for="nama">Nama</label>
          @error('nama')
          <div class="text-warning text-center">
            {{ $message }}
              </div>
              @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="text" name="username" class="form-control rounded-pill @error('username') is-invalid   @enderror" id="username" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
          <label for="username">Username</label>
          @error('username')
          <div class="text-warning text-center">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="text" name="telp" class="form-control rounded-pill @error('telp') is-invalid   @enderror" id="telp" placeholder="name@example.com" value="{{ old('telp') }}" autofocus required>
          <label for="telp">Nomor telepon</label>
          @error('telp')
          <div class="text-warning text-center">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="password" name="password" class="form-control rounded-pill @error('password') is-invalid   @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="text-warning text-center">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="password" name="ulangi_password" class="form-control rounded-pill @error('ulangi_password') is-invalid   @enderror" id="ulangi_password" placeholder="ulangi_Password" required>
          <label for="ulangi_password">Ulangi Password</label>
          @error('ulangi_password')
          <div class="text-warning text-center">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="d-flex justify-content-between">
          <label for="submin" type="submit" style="text-decoration: none" class="fw-normal text-center rounded-0 m-0 mt-4 pt-0 pb-0 text-light">
            <p class="p-0 m-0 bg-hitam rounded-pill btnku p-2 shadow-md"> Register Akun</p> 
          </label>
          <input id="submin" type="submit" value="" style="background-color: rgba(0,0,0,0); border: none;z-index:-99909;">
          <a href="{{ asset('') }}login" style="text-decoration: none" class="fw-normal text-center rounded-0 m-0 mt-4 pt-0 pb-0 text-light">
            <p class="p-0 m-0 bg-hitam rounded-pill btnku p-2 shadow-md"> Login Aduken</p> 
          </a>
        </div>
      </form>
          </div>
    </main>
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
</div>

</div>
@endsection