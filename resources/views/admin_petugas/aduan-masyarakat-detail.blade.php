@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Pengaduan</h1>
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
                  <div class="detail ml-5">
                    <h2 class="mt-3 text-center">Detail Pengaduan</h2>
                    <div class="image img-fluid d-flex justify-content-center col-lg-12 mb-4">
                      <img src="{{ asset('storage/'. $pengaduan->foto) }}" class="col-lg-6 rounded-3 m-0 p-0 shadow-sm" alt="">
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
                          @if ( $pengaduan->status === 'diproses')
                            <b class="text-primary">sedang Diproses</b>
                          @elseif( $pengaduan->status  === 'selesai')
                            <b class="text-success">sudah Selesai</b>
                          @elseif( $pengaduan->status  === 'ditolak')
                            <b class="text-danger">diTolak</b>
                          @else
                            <b class="text-warning">Menunggu</b>
                          @endif
                        </p></li>
                      </ul>
                    </div>
                  </div>
                  @if ($tanggapan != null)
                  <div class="col-lg-12 d-flex justify-content-center mb-5">
                    <div class="col-lg-3 glass-card-t mr-4" style="height:140px;">
                      <ul class="mt-2" style="list-style:none;">
                        <li><p>Tanggal diTanggapi : <br> <b>{{ $tanggapan->tgl_tanggapan }}</b></p></li>
                        <li><p>diTanggapi Oleh: <br> <b>{{ $tanggapan->petugas->nama_petugas }}</b></p></li>
                      </ul>
                    </div>
                  <div class="col-lg-6 glass-card-t p-3">
                    <h4 class="text-center">Isi Tanggapan</h4>
                    <p>{{ $tanggapan->tanggapan }}</p>
                  </div>
                </div>
                  @endif
                <hr>
                <a class="btn glass-card-btn mb-4 ml-4" href="{{ asset('') }}aduan">Kembali</a>

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