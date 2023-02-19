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
  .h-login{
  background: rgba(255, 175, 175, 0.9);
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
.bg-main{
  background-color: #f0e0c9
}
.bg-hitam{
  background-color: rgba(111, 114, 92,.8)
}
.bg-merah{
  background-color: rgb(177, 49, 38,1)
}
.bg-hitam2{
      background-color: rgba(35, 114, 128, 0.3)
    }
    .btnku{
      border: 1px solid rgba(35, 114, 128, 0.3) ;
    }
    .btnku:hover{
      transition: ease-out;
      border:1px solid white;
      background-color: #f0e0c9;
      transform: scale(1.01);
      color: black;
    }
  </style>
  <body class="bg-main">
    <div class="d-flex justify-content-center" >
      @yield('container')
    </div>
    



      <script src="{{ asset('') }}bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>