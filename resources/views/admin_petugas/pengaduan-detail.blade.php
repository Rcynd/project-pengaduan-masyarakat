@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tanggapi</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card glass-card-t">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
                    <!-- form start -->
                    <form method="post" action="{{ asset('') }}registrasi/create" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama_petugas">Nama</label>
                          @error('nama_petugas')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control rounded-pill" id="nama_petugas" value="{{ old('nama_petugas') }}" name="nama_petugas" placeholder="Enter nama_petugas">
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          @error('username')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control rounded-pill" id="username" value="{{ old('username') }}" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          @error('password')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="password" class="form-control rounded-pill" id="password" value="{{ old('password') }}" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                          <label for="ulangi_password">Ulangi Password</label>
                          @error('ulangi_password')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="password" class="form-control rounded-pill" id="ulangi_password" value="{{ old('ulangi_password') }}" name="ulangi_password" placeholder="Enter ulangi_password">
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telepon</label>
                            @error('telp')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="text" class="form-control rounded-pill" id="telp" value="{{ old('telp') }}" name="telp" placeholder="Enter No telepon">
                        </div>
                        <div class="form-group">
                            <label for="level">Role</label>
                            @error('level')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <select class="form-control rounded-pill"name="level">
                             <option value="admin">admin</option>
                             <option value="petugas">petugas</option>
                            </select>
                          </div>
                      <!-- /.card-body -->
      
                      <div class="">
                        <a class="btn glass-card-btn" href="{{ asset('') }}pengaduan">Kembali</a>
                        <button type="submit" class="btn text-dark float-right glass-card-btn2">Kirim</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection