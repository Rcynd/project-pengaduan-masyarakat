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
                  <div class="biodata">
                    <h2 class="mt-5 ml-5">Data Pengadu</h2>
                    <table class="ml-5" cellpadding="10">
                      <tr class="pb-5">
                        <td>NIK</td>
                        <td>: {{ $pengaduan->masyarakat->nik }}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>: {{ $pengaduan->masyarakat->nama }}</td>
                      </tr>
                      <tr>
                        <td>No Telepon</td>
                        <td>: {{ $pengaduan->masyarakat->telp }}</td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td>: {{ $pengaduan->masyarakat->username }}</td>
                      </tr>
                    </table>
                  </div>
                  <hr>
                  <div class="detail ml-5">
                    <h2 class="mt-3 text-center">Detail Pengaduan</h2>
                    <div class="image img-fluid d-flex justify-content-center col-lg-12 mb-4">
                      <img src="{{ asset('') }}adminlte/img/photo2.png" class="col-lg-6 rounded-3 m-0 p-0 shadow-sm" alt="">
                    </div>
                  </div>
                  <div class="col-lg-12 d-flex justify-content-center mb-5">
                    <div class="col-lg-6 glass-card-t p-3">
                      <h4 class="text-center">Isi Laporan</h4>
                      <p>{{ $pengaduan->isi_laporan }}</p>
                    </div>
                    <div class="col-lg-3 glass-card-t ml-4" style="height:140px;">
                      <ul class="mt-2" style="list-style:none;">
                        <li><p>Tanggal pengaduan : <br> <b>{{ $pengaduan->tgl_pengaduan }}</b></p></li>
                        <li><p>Status :<br>
                          @if ( $pengaduan->isi_laporan === 'proses')
                            <b class="text-primary">sedang Diproses</b>
                          @elseif( $pengaduan->isi_laporan  === 'selesai')
                            <b class="text-success">sudah Selesai</b>
                          @else
                            <b class="text-danger">Menunggu</b>
                          @endif
                        </p></li>
                      </ul>
                    </div>
                  </div>
                  @if ($pengaduan->status == '0')
                  <hr>
                    <!-- form start -->
                    <form method="post" action="{{ asset('') }}tanggapan/create" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" id="tanggapan">
                          <label for="nama_petugas">Nama Petugas :<br><b class="pl-3 font-weight-normal">{{ auth()->user()->nama_petugas }}</b></label><br>
                          <label for="level">Level :<br><b class="pl-3 font-weight-normal">{{ auth()->user()->level }}</b></label>
                          <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            @error('tanggapan')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea id="description" class="form-control" name="tangapan"rows="3">{{ old('tanggapan') }}</textarea>
                          </div>
                          <input type="hidden" name="id_petugas" value="{{ auth()->user()->id }}">
                          <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id }}">
                          <input type="hidden" name="tgl_tanggapan" value="">
                      <!-- /.card-body -->
      
                      <div class="">
                        <a class="btn glass-card-btn" href="{{ asset('') }}pengaduan">Kembali</a>
                        <button type="submit" class="btn text-dark float-right glass-card-btn2">Kirim</button>
                      </div>
                    </form>
                    @endif

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