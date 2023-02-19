
<nav class="main-header navbar navbar-expand bg-hitam2 navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <a href="{{ asset('') }}" class="nav-link">Dashboard</a> --}}
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Logout Menu -->
        <li class="nav-item dropdown">
        <div>
          <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="nav-link bg-light shadow-lg btn btn-none border-none" onclick="return confirm('Yakin ingin melakukan Logout?')">Logout <span data-feather="log-out"></span></button>
            </form>
          </div>
            

        </div>
        </li>
    </ul>
  </nav>
