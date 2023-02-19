<aside class="main-sidebar sidebar-light bg-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('') }}adminlte/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-light">Aduken</span>
      </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex " >
        <div class="image">
          <img src="{{ asset('') }}adminlte/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" >
          <a href="#" class="d-block text-light">{{ Auth()->user()->nama_petugas }}</a>
        </div>
      </div>
  
      <!-- SidebarSearch Form -->
      <div class="form-inline">
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
            <a href="/dashboard" class="nav-link text-light {{ Request::is('dashboard*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- @endcan --}}
          {{-- @can('admin') --}}
          <li class="nav-item">
            <a href="/registrasi" class="nav-link text-light{{ Request::is('registrasi*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="">
                Registrasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pengaduan" class="nav-link text-light {{ Request::is('pengaduan*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/respon" class="nav-link text-light {{ Request::is('respon*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Respon
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link text-light {{ Request::is('laporan*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          {{-- @endcan --}}
          {{-- @can('petugas') --}}
          {{-- <li class="nav-item">
            <a href="/transaksi" class="nav-link text-light {{ Request::is('transaksi*') ? 'bg-dark' : '' }} ">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                transaksi pembayaran
              </p>
            </a>
          </li> --}}
          {{-- @endcan --}}
          {{-- <li class="nav-item">
            <a href="/histori" class="nav-link text-light {{ Request::is('histori*') ? 'bg-dark' : '' }} ">
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