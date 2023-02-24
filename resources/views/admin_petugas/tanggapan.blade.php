@extends('layouts.master')
@section('content')

 

    <h1 class="text-center pt-2 pb-2">Halaman Tanggapan</h1>
  @if (session()->has('sukses'))
  <div class="card glass-card-t m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-success d-flex justify-content-center align-items-center">
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
                      <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/tanggapan" method="get">
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
                        {{-- <th>id_spp</th> --}}
                        <th class="text-right">aksi</th>
                      </tr>
                    </thead>
                    <tbody class="p-0">
                        @foreach ($tanggapans as $tanggapan)
                        @if ($tanggapan->pengaduan->status == 'proses')
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
                          <td>{{ Str::limit( $tanggapan->tanggapan, 30, '...') }}</td>
                          {{-- <td>{{ $user->id_spp }}</td> --}}
                          <td class="d-flex justify-content-end">
                            <p class="text-dark" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-circle mr-2 hov"></i></p>
                            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                                <a href="{{ asset('') }}tanggapan/detail/{{ $tanggapan->id }}" class="dropdown-item">
                                    detail
                                </a>
                                @if ($tanggapan->pengaduan->status == 'proses')
                                <a href="{{ asset('') }}tanggapan/selesai/{{ $tanggapan->pengaduan->id }}" class="dropdown-item">
                                  selesai
                                </a>
                                @endif
                                <a href="{{ asset('') }}tanggapan/hapus/{{ $tanggapan->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
                                    hapus
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