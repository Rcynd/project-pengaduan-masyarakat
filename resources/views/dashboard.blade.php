@extends('layouts.master')
@section('content')
 <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('') }}adminlte/img/download.jpg" alt="SMKBN666_Logo" height="60" width="60">
  </div>
  
  <h1 class="text-center pt-2 pb-2">Halaman Dashboard</h1>
  @if (session()->has('sukses'))
  <div class="card glass-card-t m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-danger d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
  @if (session()->has('change'))
  <div class="card glass-card-t m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-success d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('change') }}</p>
    </div>
  </div>
  @endif
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row d-flex justify-content-center">
          @can('admin')
          <!-- /.col -->
          <a href="{{ asset('registrasi') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-hitam elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Petugas</span>
                <span class="info-box-number">{{ number_format($jml_petugas) }}  <i class="font-weight-light">people</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          @endcan
          @can('petugas')
          <a href="{{ asset('masyarakat') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-user text-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Masyarakat</span>
                <span class="info-box-number">{{ number_format($jml_masyarakat) }}  <i class="font-weight-light">people</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          <a href="{{ asset('pengaduan') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-hitam elevation-1"><i class="fas fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengaduan Masuk</span>
                <span class="info-box-number">{{ number_format($jml_pengaduan) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          <a href="{{ asset('pengaduan') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengaduan diBaca</span>
                <span class="info-box-number">{{ number_format($jml_proses) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          <a href="{{ asset('tanggapan') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-comments"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ditanggapi</span>
                <span class="info-box-number">{{ number_format($jml_tanggapan) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          @endcan
          @can('masyarakat')
          <a href="{{ asset('aduan') }}" class="col-12 col-sm-6 col-md-3 text-dark">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-hitam elevation-1"><i class="fas fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengaduan Saya</span>
                <span class="info-box-number">{{ number_format($jml_pengaduan_ku) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
          <!-- /.col -->
          @endcan
        </div>
        <!-- /.row -->
@endsection