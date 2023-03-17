@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Tanggapan</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if (session()->has('sukses'))
  <div class="card bg-success rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card glass-card-t">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
                  <div class="biodata d-flex justify-content-center">
                    <div class="masyarakat col-lg-4">
                        <h2 class="mt-5 text-center">Data Pengadu</h2>
                        <table class="ml-5" cellpadding="10">
                          <tr class="pb-5">
                            <td>NIK</td>
                            <td>: {{ $tanggapan->pengaduan->masyarakat->nik }}</td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>: {{ $tanggapan->pengaduan->masyarakat->nama }}</td>
                          </tr>
                          <tr>
                            <td>No Telepon</td>
                            <td>: {{ $tanggapan->pengaduan->masyarakat->telp }}</td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td>: {{ $tanggapan->pengaduan->masyarakat->username }}</td>
                          </tr>
                        </table>
                    </div>
                    <div class="petugas col-lg-4">
                        <h2 class="mt-5 text-center">Data Petugas</h2>
                        <table class="ml-5" cellpadding="10">
                          <tr class="pb-5">
                            <td>Nama</td>
                            <td>: {{ $tanggapan->petugas->nama_petugas }}</td>
                          </tr>
                          <tr>
                            <td>No Telepon</td>
                            <td>: {{ $tanggapan->petugas->telp }}</td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td>: {{ $tanggapan->petugas->username }}</td>
                          </tr>
                          <tr>
                            <td>Level</td>
                            <td>: {{ $tanggapan->petugas->level }}</td>
                          </tr>
                        </table>
                    </div>
                  </div>
                  <hr>
                  <div class="detail ml-5">
                    <h2 class="mt-3 text-center">Detail Pengaduan</h2>
                    <div class="image img-fluid d-flex justify-content-center col-lg-12 mb-4">
                      <img src="{{ asset('storage/'. $tanggapan->pengaduan->foto) }}" class="col-lg-6 rounded-3 m-0 p-0 shadow-sm" alt="">
                    </div>
                  </div>
                  <div class="col-lg-12 d-flex justify-content-center mb-5">
                    <div class="col-lg-6 glass-card-t p-3">
                      <h4 class="text-center">Isi Laporan</h4>
                      <p>{{ $tanggapan->pengaduan->isi_laporan }}</p>
                    </div>
                    <div class="col-lg-3 glass-card-t ml-4" style="height:140px;">
                      <ul class="mt-2" style="list-style:none;">
                        <li><p>Tanggal pengaduan : <br> <b>{{ $tanggapan->pengaduan->tgl_pengaduan }}</b></p></li>
                        <li><p>Status :<br>
                          @if ( $tanggapan->pengaduan->status === 'diproses')
                            <b class="text-primary">sedang Diproses</b>
                          @elseif( $tanggapan->pengaduan->status  === 'selesai')
                            <b class="text-success">sudah Selesai</b>
                          @else
                            <b class="text-danger">Menunggu</b>
                          @endif
                        </p></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-12 d-flex justify-content-center mb-5">
                      <div class="col-lg-3 glass-card-t mr-4" style="height:140px;">
                        <ul class="mt-2" style="list-style:none;">
                          <li><p>Tanggal diTanggapi : <br> <b>{{ $tanggapan->tgl_tanggapan }}</b></p></li>
                          <li><p>diTanggapi Oleh: <br> <b>{{ $tanggapan->petugas->nama_petugas }}</b></p></li>
                        </ul>
                      </div>
                    <div class="col-lg-6 glass-card-t">
                      <h4 class="text-center">Isi Tanggapan</h4>
                      <form method="post" action="{{ asset('') }}tanggapan/edit" class="mb-0" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" id="tanggapan">
                          <div class="form-group">
                            @error('tanggapan')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea id="description" class="form-control" name="tangapan"rows="3">{{ old('telp', $tanggapan->tanggapan) }}</textarea>
                          </div>
                          <input type="hidden" name="id_petugas" value="{{ auth()->user()->id }}">
                          <input type="hidden" name="id_pengaduan" value="{{ $tanggapan->pengaduan->id }}">
                          <input type="hidden" name="tgl_tanggapan" value="{{ $tanggapan->tgl_tanggapan }}">
                          <input type="hidden" name="id_tanggapan" value="{{ $tanggapan->id }}">
                      <!-- /.card-body -->
      
                      <div class="">
                        <button type="submit" class="btn text-dark float-right glass-card-btn2">ubah</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <hr>
                <a class="btn glass-card-btn mb-4 ml-4" href="{{ asset('') }}tanggapan">Kembali</a>
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