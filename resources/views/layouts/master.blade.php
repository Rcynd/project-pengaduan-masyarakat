<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aduken </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}adminlte/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/summernote/summernote-bs4.min.css">
  {{-- CSS Buatan --}}
  <style>
    .glass-card{
  background: rgba(238, 235, 245, 0.7);
  border-radius: 20px;
  border-left: 1px solid rgba(238, 235, 245, 0.7);
  border-top: 1px solid rgba(238, 235, 245, 0.7);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
    .glass-card-t{
  background: rgba(238, 235, 245, 0.2);
  border-radius: 20px;
  border-left: 1px solid rgba(238, 235, 245, 0.2);
  border-top: 1px solid rgba(238, 235, 245, 0.2);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
    .glass-card-btn{
  background: rgba(21, 207, 136, 1);
  border-radius: 20px;
  border-left: 1px solid rgba(21, 207, 136, 1);
  border-top: 1px solid rgba(21, 207, 136, 1);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
    .glass-card-btn:hover{
  background: rgb(226, 218, 245);
  transition: all ease-out;
}
    .glass-card-btn2{
  background: rgba(152, 251, 152, 1);
  border-radius: 20px;
  border-left: 1px solid rgba(152, 251, 152, 1);
  border-top: 1px solid rgba(152, 251, 152, 1);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
    .glass-card-btn2:hover{
  background: rgb(226, 218, 245);
  transition: all ease-out;
}
.bg-main{
  background-color: rgb(34, 34, 34);
  background-image: linear-gradient(150deg,rgb(169, 169, 169),rgb(21, 207, 136 ));
  background-repeat: no-repeat;
}
.bg-hitam{
  background-color: rgb(21, 207, 136);
  
}
.bg-sidebar{
  background-color: rgb(34, 34, 34);
}
.bg-pink{
  background-color: rgba(249, 193, 235,.3)
}
    /* .bg-hitam{
      background-color: rgba(86, 128, 207, 0.4)
    }
    .bg-sidebar{
      background-color: rgba(166, 187, 190, 0.9)
    }
    .bg-hitam2{
      background-color: rgba(238, 235, 245, 0.7)
    } */
    .tombol-tambah{
      background: rgba(86, 128, 207, 0.4);
  border-radius: 20px;
  border-left: 1px solid rgba(86, 128, 207, 0.4);
  border-top: 1px solid rgba(86, 128, 207, 0.4);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
    }
    .tombol-tambah:hover{
      background: rgba(238, 235, 245, 0.7);
      transition: ease-in;
    }
    .hov:hover{
      color: rgb(21, 207, 136)
    }
    .hov{
      color: rgb(255, 255, 255)
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 
  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('') }}adminlte/img/download.jpg" alt="SMKBN666_Logo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  @include('layouts.mainbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-main mr-0">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('') }}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('') }}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
<script src="{{ asset('') }}plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}adminlte/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}adminlte/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}adminlte/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
</body>
</html>
