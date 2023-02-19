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
  <div class=" d-flex justify-content-around">
      <main class="col-lg-4 rounded-3 p-4 bg-hitam2">
            <form action="/login" method="post">
              @csrf
              
              <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control @error('username') is-invalid   @enderror" id="username" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                    </div>
                    @enderror
              </div>
              <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Log in</button>
            </form>
        </main>
      </div>
</div>
@endsection