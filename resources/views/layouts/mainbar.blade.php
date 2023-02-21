
<nav class="main-header navbar navbar-light bg-hitam">
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
              <label for="logout" class="link font-weight-normal mt-2 hov" onclick="return confirm('Yakin ingin melakukan Logout?')" style="background-image: rgba(0,0,0,0)" >Logout <i class="nav-icon fas fa-arrow-circle-right"></i></label>
              <input type="submit" id="logout" value="" style="background-color: rgba(0,0,0,0); border: none;z-index:-99909; position:absolute;">
            </form>
          </div>
            

        </div>
        </li>
    </ul>
  </nav>
