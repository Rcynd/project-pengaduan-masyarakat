@extends('layouts.master')
@section('content')


    <h1 class="text-center pt-2 pb-2">Halaman Laporan</h1>
  @if (session()->has('sukses'))
  <div class="card bg-success rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
    <section class="content  ">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card glass-card-t">
                <div class="card-header bg-none">
                  @can('admin')
                  <a href="{{ asset('') }}cetak-laporan" target="blank_" class="btn ml-2 deeefloat-left tombol-tambah mt-2">Cetak Laporan</a>
                  @endcan
                      <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/pengaduan" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="search" value="">
                            <button class="btn btn-default" type="submit" ><i class="fas fa-search"></i></button>
                        </div>
                      </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Nama Petugas</th>
                        <th>Nama Pengadu</th>
                        <th>tanggal diTanggapi</th>
                        <th>status</th>
                        <th>isi tanggapan</th>
                      </tr>
                    </thead>
                    <tbody class="p-0">
                        @foreach ($tanggapans as $tanggapan)
                        @if ($tanggapan->pengaduan->status != '0')
                        <tr>
                            <td>{{ $tanggapan->petugas->nama_petugas }}</td>
                            <td>{{ $tanggapan->pengaduan->masyarakat->nama }}</td>
                            <td>{{ $tanggapan->tgl_tanggapan }}</td>
                            @if ($tanggapan->pengaduan->status == '0')
                          <td class="text-danger">Menunggu</td>
                          @elseif($tanggapan->pengaduan->status == 'proses')
                          <td class="text-primary">diProses</td>
                          @else
                          <td class="text-success">Selesai</td>
                          @endif
                          <td>{{ Str::limit($tanggapan->tanggapan, 30, '...') }}</td>
                          {{-- <td>{{ $user->id_spp }}</td> --}}
                          <td class="d-flex justify-content-end">
                            <p class="btn btn-primary p-0 text-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">menu</p>
                            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                                <a href="{{ asset('') }}laporan/detail/{{ $tanggapan->id }}" class="dropdown-item">
                                    detail
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-end mr-5 mt-2">
                  {{ $tanggapans->links() }}
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