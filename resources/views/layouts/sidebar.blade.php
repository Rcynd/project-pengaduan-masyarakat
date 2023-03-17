<aside class="main-sidebar sidebar-light bg-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('') }}adminlte/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-light">ADUKEN</span>
      </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class=" mt-3 mb-3 d-flex justify-content-center {{ Request::is('profile*') ? 'bg-hitam rounded-pill' : '' }}" >
          <img src="{{ asset('') }}adminlte/img/avatar5.png" width="35" height="35" class="img-circle elevation-2" alt="User Image">
        <div class="dropdown">
          <button class="btn btn-none text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth()->user()->nama_petugas }}
          </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-default">profile</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-change-password">ganti password</a>
            </div>  
        </div>
      </div>
      <hr class="bg-light mt-0 pt-0">
  
      <!-- SidebarSearch Form -->
      <div class="form-inline ">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- @can('petugas') --}}
          <li class="nav-item">
            <a href="/dashboard" class="nav-link text-light {{ Request::is('dashboard*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- @endcan --}}
          @can('admin')
          <li class="nav-item">
            <a href="/registrasi" class="nav-link text-light {{ Request::is('registrasi*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="">
                Data Petugas
              </p>
            </a>
          </li>
          @endcan
          @can('petugas')
          <li class="nav-item">
            <a href="/masyarakat" class="nav-link text-light {{ Request::is('masyarakat*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="">
                Data Masyarakat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pengaduan" class="nav-link text-light {{ Request::is('pengaduan*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tanggapan" class="nav-link text-light {{ Request::is('tanggapan*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Tanggapan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link text-light {{ Request::is('laporan*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endcan
          @can('masyarakat')
          <li class="nav-item">
            <a href="/aduan" class="nav-link text-light {{ Request::is('aduan*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Aduan
              </p>
            </a>
          </li>
          @endcan
          {{-- @can('petugas') --}}
          {{-- <li class="nav-item">
            <a href="/transaksi" class="nav-link text-light {{ Request::is('transaksi*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                transaksi pembayaran
              </p>
            </a>
          </li> --}}
          {{-- @endcan --}}
          {{-- <li class="nav-item">
            <a href="/histori" class="nav-link text-light {{ Request::is('histori*') ? 'bg-hitam rounded-pill' : '' }} ">
              <i class="nav-icon fas fa-history"></i>
              <p>
                History Pembayaran
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><p class="text-center">Profile</p></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <img src="{{ asset('') }}adminlte/img/avatar5.png" width="30%" height="30%" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="modal-footer justify-content-center">
          <table style="font-size: 1.5rem">
            <tr>
              <td>Nama</td>
              <td>: {{ auth()->user()->nama_petugas }}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>: {{ auth()->user()->username }}</td>
            </tr>
            <tr>
              <td>No Telepon</td>
              <td>: {{ auth()->user()->telp }}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>: {{ auth()->user()->level }}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer justify-content-center">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-change-password">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><p class="text-center">Ganti Password</p></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <form style="" action="{{ asset("change-password") }}" method="post">
            @csrf
            <div class="form-group">
              <label for="password_lama">Password Lama</label>
              @error('password_lama')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="password" class="form-control rounded-pill" id="password_lama" value="{{ old('password_lama') }}" name="password_lama" placeholder="Enter password lama">
            </div>
            <div class="form-group">
              <label for="password_baru">Password Baru</label>
              @error('password_baru')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="password" class="form-control rounded-pill" id="password_baru" value="{{ old('password_baru') }}" name="password_baru" placeholder="Enter password baru">
            </div>
            <div class="form-group">
              <label for="password_baru_confirmation">Ulangi Password Baru</label>
              @error('password_baru_confirmation')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="password" class="form-control rounded-pill" id="password_baru_confirmation" value="{{ old('password_baru_confirmation') }}" name="password_baru_confirmation" placeholder="Enter ulangi password">
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-none"><p class="text-center btn btn-primary rounded-pill">Ubah</p></button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->