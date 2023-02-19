<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rian Blog | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('') }}bootstrap/css/bootstrap.min.css">
    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- my Styles --}}
    <link rel="stylesheet" href="css/style.css">
  </head>
  <style>
    main ,.h-login{
  background: rgba(255, 255, 255, 0.04);
  border-radius: 20px;
  border-left: 1px solid rgba(255, 255, 255, 0.3);
  border-top: 1px solid rgba(255, 255, 255, 0.3);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.bg-hitam{
  background-color: rgba(166, 188, 229, 0.4)
}
.bg-hitam2{
      background-color: rgba(35, 114, 128, 0.3)
    }
  </style>
  <body class="bg-hitam">
      <div class="" style="margin-top: 12%">
        @yield('container')
      </div>



      <script src="{{ asset('') }}bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>