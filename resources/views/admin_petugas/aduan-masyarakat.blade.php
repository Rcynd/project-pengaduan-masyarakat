@extends('layouts.master')
@section('content')


    <h1 class="text-center pt-2 pb-2">Halaman Aduan</h1>
  @if (session()->has('sukses'))
  <div class="card bg-success rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
  @if (session()->has('change'))
  <div class="card bg-success rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('change') }}</p>
    </div>
  </div>
  @endif
    <section class="content  ">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card glass-card-t">
                <div class="card-header bg-none">
                    <a href="{{ asset('') }}aduan/create" class="btn float-left tombol-tambah mt-2">Tambah Pengaduan</a>
                      <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/aduan" method="get">
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
                        <th>tanggal pengaduan</th>
                        <th>isi pengaduan</th>
                        <th>status</th>
                        {{-- <th>id_spp</th> --}}
                        <th class="text-right">aksi</th>
                      </tr>
                    </thead>
                    <tbody class="p-0">
                        @foreach ($pengaduans as $pengaduan)
                        <tr>
                          <td>{{ $pengaduan->tgl_pengaduan }}</td>
                          <td>{{ Str::limit($pengaduan->isi_laporan,45,'...') }}</td>
                            @if ($pengaduan->status == 'menunggu')
                            <td class="text-warning">Menunggu</td>
                            @elseif($pengaduan->status == 'diproses')
                            <td class="text-primary">Dibaca</td>
                            @elseif($pengaduan->status == 'ditolak')
                            <td class="text-danger">diTolak</td>
                            @else
                            <td class="text-success">Selesai</td>
                            @endif
                          {{-- <td>{{ $user->id_spp }}</td> --}}
                          <td class="d-flex justify-content-end">
                            <p class="btn btn-primary p-0 text-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">menu</p>
                            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                                <a href="{{ asset('') }}aduan/detail/{{ $pengaduan->id }}" class="dropdown-item">
                                    detail
                                </a>
                                <a href="{{ asset('') }}aduan/hapus/{{ $pengaduan->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
                                    hapus
                                </a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-end mr-5 mt-2">
                  {{ $pengaduans->links() }}
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