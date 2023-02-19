@extends('login.layout.main')
@section('container')

@if (session()->has('loginError'))
<div class="d-flex justify-content-center">
  <div class="alert alert-danger alert-dismissible fade show text-center col-lg-5" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
<div class="d-flex justify-content-center">
  <div class="col-lg-4 fw-normal text-center h3 rounded-3 shadow-sm p-2 h-login bg-hitam2">
    Login Project-SPP
  </div>
</div>
  <div class=" d-flex justify-content-around mb-5">
      <main class="col-lg-4 rounded-3 p-4 bg-hitam2">
            <form action="/register" method="post">
              @csrf
              
              <div class="form-floating mt-2">
                <input type="text" name="nik" class="form-control @error('nik') is-invalid   @enderror" id="nik" placeholder="name@example.com" value="{{ old('nik') }}" autofocus required>
                <label for="nik">NIK</label>
                @error('nik')
                <div class="invalid-feedback">
                  {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid   @enderror" id="nama" placeholder="name@example.com" value="{{ old('nama') }}" autofocus required>
                <label for="nama">Nama</label>
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control @error('username') is-invalid   @enderror" id="username" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="text" name="telp" class="form-control @error('telp') is-invalid   @enderror" id="telp" placeholder="name@example.com" value="{{ old('telp') }}" autofocus required>
                <label for="telp">telp</label>
                @error('telp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid   @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-3">
                <input type="ulangi_password" name="ulangi_password" class="form-control @error('ulangi_password') is-invalid   @enderror" id="ulangi_password" placeholder="ulangi_Password" required>
                <label for="ulangi_password">Ulangi Password</label>
                @error('ulangi_password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Log in</button>
            </form>
        </main>
      </div>
</div>
@endsection