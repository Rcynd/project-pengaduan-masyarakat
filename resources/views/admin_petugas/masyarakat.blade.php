@extends('layouts.master')
@section('content')


    <h1 class="text-center pt-2 pb-2">Halaman Registrasi Masyarakat</h1>
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
                    <a href="{{ asset('') }}masyarakat/create" class="btn float-left tombol-tambah mt-2">Tambah Registrasi</a>
                    {{-- <a href="{{ asset('') }}cetak-siswa" target="blank_" class="btn ml-2 float-left tombol-tambah mt-2">Cetak Siswa</a> --}}
                  {{-- <p class="btn float-left tombol-tambah mt-2" data-toggle="modal" data-target="#modal-lg">Tambah Siswa</p> --}}
    
                      <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/registrasi" method="get">
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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No Telepon</th>
                        <th>Validasi</th>
                        {{-- <th>id_spp</th> --}}
                        <th class="text-right">aksi</th>
                      </tr>
                    </thead>
                    <tbody class="p-0">
                        @foreach ($masyarakats as $masyarakat)
                        <tr>
                          <td>{{ $masyarakat->nik }}</td>
                          <td>{{ $masyarakat->nama }}</td>
                          <td>{{ $masyarakat->username }}</td>
                          <td>{{ $masyarakat->telp }}</td>
                          @if ($masyarakat->isValidate == 'notValidate')
                              <td class="text-danger"> belum diValidasi </td>
                          @else
                              <td class="text-success"> sudah diValidasi </td>
                          @endif
                          {{-- <td>{{ $user->id_spp }}</td> --}}
                          <td class="d-flex justify-content-end">
                            <p class="text-dark" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-circle mr-2 hov"></i></p>
                            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                                <a href="{{ asset('') }}masyarakat/hapus/{{ $masyarakat->username }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
                                    Hapus
                                </a>
                                <form action="{{ asset('') }}masyarakat/validasi/{{ $masyarakat->nik }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="nama_petugas" value="{{ $masyarakat->nama }}">
                                  <input type="hidden" name="username" value="{{ $masyarakat->username }}">
                                  <input type="hidden" name="password" value="{{ $masyarakat->password }}">
                                  <input type="hidden" name="telp" value="{{ $masyarakat->telp }}">
                                  <input type="hidden" name="level" value="masyarakat">
                                  <label for="kirim" class="dropdown-item font-weight-normal" onclick="return confirm(' Validasi Data ini?')"> Validasi </label>
                                  <input id="kirim" type="submit" value="" style="position:absolute; background-color: rgba(0,0,0,0); border: none;z-index:-99909;">
                                </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-end mr-5 mt-2">
                  {{ $masyarakats->links() }}
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