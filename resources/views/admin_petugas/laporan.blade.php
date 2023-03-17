@extends('layouts.master')
@section('content')


    <h1 class="text-center pt-2 pb-2">Halaman Laporan</h1>
  @if (session()->has('sukses'))
  <div class="card glass-card-t rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
  @if (session()->has('change'))
  <div class="card glass-card-t rounded-pill p-1 m-3" data-bs-dismiss="alert" aria-label="Close">
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
                  @can('admin')
                  <div class="dropdown show">
                    <p class="btn ml-2 float-left tombol-tambah mt-3 dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cetak Laporan</p>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{ asset('') }}cetak-laporan" target="blank_">Cetak Semua</a>
                      <a class="dropdown-item" href="#" target="blank_" data-toggle="modal" data-target="#modal-petugas">Nama Petugas</a>
                      <a class="dropdown-item" href="#" target="blank_" data-toggle="modal" data-target="#modal-pengadu">Nama Pengadu</a>
                      <a class="dropdown-item" href="#" target="blank_" data-toggle="modal" data-target="#modal-tanggal">Tanggal</a>
                    </div>
                  </div>
                  <div class="dropdown show">
                    <a class=" dropdown-toggle btn ml-2 float-left tombol-tambah mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cetak Laporan PDF
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a href="{{ asset('') }}cetak-laporan-pdf" class="dropdown-item" target="blank_" class="">Cetak Semua</a>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-petugas-pdf">Nama Petugas</a>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-pengadu-pdf">Nama Pengadu</a>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-tanggal-pdf">Tanggal</a>
                    </div>
                    @endcan
                    <div class="dropdown show">
                      <a class=" dropdown-toggle btn ml-2 float-left tombol-tambah mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter
                      </a>
                      
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="{{ asset('') }}laporan" class="dropdown-item" target="blank_" class="">Tampilkan semua</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-petugas-filter">Tampilkan berdasarkan Petugas</a>
                        {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-pengadu-filter">Tampilkan berdasarkan pengadu</a> --}}
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-tanggal-filter">Tampilkan berdasarkan Tanggal</a>
                      </div>
                    </div>
                      <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/laporan" method="get">
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
                        @if ($tanggapan->pengaduan->status == 'selesai')
                        <tr>
                            <td>{{ $tanggapan->petugas->nama_petugas }}</td>
                            <td>{{ $tanggapan->pengaduan->masyarakat->nama }}</td>
                            <td>{{ $tanggapan->tgl_tanggapan }}</td>
                            @if ($tanggapan->pengaduan->status == 'menunggu')
                          <td class="text-danger">Menunggu</td>
                          @elseif($tanggapan->pengaduan->status == 'diproses')
                          <td class="text-primary">Dibaca</td>
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

      <div class="modal fade" id="modal-petugas">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-petugas" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_petugas" class="form-control rounded-pill">
                @foreach ($petugass as $petugas)
                  <option value="{{ $petugas->username }}">{{ $petugas->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-pengadu">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-pengadu" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_pengadu" class="form-control rounded-pill">
                @foreach ($masyarakats as $masyarakat)
                  <option value="{{ $masyarakat->username }}">{{ $masyarakat->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-tanggal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-tanggal" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
                <input type="date" class="form-control rounded-pill" name="tanggalStart" id="">
                <p class="text-center mt-3">s/d</p>
                <input type="date" class="form-control rounded-pill" name="tanggalEnd" id="">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <div class="modal fade" id="modal-petugas-pdf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-petugas-pdf" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_petugas" class="form-control rounded-pill">
                @foreach ($petugass as $petugas)
                  <option value="{{ $petugas->username }}">{{ $petugas->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-pengadu-pdf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-pengadu-pdf" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_pengadu" class="form-control rounded-pill">
                @foreach ($masyarakats as $masyarakat)
                  <option value="{{ $masyarakat->username }}">{{ $masyarakat->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-tanggal-pdf">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}cetak-laporan-tanggal-pdf" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
                <input type="date" class="form-control rounded-pill" name="tanggalStart" id="">
                <p class="text-center mt-3">s/d</p>
                <input type="date" class="form-control rounded-pill" name="tanggalEnd" id="">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <div class="modal fade" id="modal-petugas-filter">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}filter-petugas" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_petugas" class="form-control rounded-pill">
                @foreach ($petugass as $petugas)
                  <option value="{{ $petugas->username }}">{{ $petugas->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-pengadu-filter">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}filter-pengadu" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
              <select name="nama_pengadu" class="form-control rounded-pill">
                @foreach ($masyarakats as $masyarakat)
                  <option value="{{ $masyarakat->username }}">{{ $masyarakat->nama_petugas }}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-tanggal-filter">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form method="post" action="{{ asset('') }}filter-tanggal" class="m-0 p-0" enctype="multipart/form-data">
                @csrf
                <input type="date" class="form-control rounded-pill" name="tanggalStart" id="">
                <p class="text-center mt-3">s/d</p>
                <input type="date" class="form-control rounded-pill" name="tanggalEnd" id="">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection