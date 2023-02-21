@extends('layouts.master')
@section('content')
    <h1 class="text-center pt-2 pb-2">Halaman Dashboard</h1>
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-hitam elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Admin</span>
                <span class="info-box-number">{{ number_format($jml_petugas) }}  <i class="font-weight-light">people</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Masyarakat</span>
                <span class="info-box-number">{{ number_format($jml_masyarakat) }}  <i class="font-weight-light">people</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-hitam elevation-1"><i class="fas fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengaduan Masuk</span>
                <span class="info-box-number">{{ number_format($jml_pengaduan) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box glass-card mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-comments"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ditanggapi</span>
                <span class="info-box-number">{{ number_format($jml_tanggapan) }} <i class="font-weight-light">pengaduan</i></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
@endsection