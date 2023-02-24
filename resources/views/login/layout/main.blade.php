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
  background: rgba(38, 223, 152, 0.7);
  border-radius: 20px;
  border-left: 1px solid rgba(249, 193, 235,.3);
  border-top: 1px solid rgba(249, 193, 235,.3);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.bg-main-m{

  background:rgb(14, 51, 37) ;
}
.bg-main{
  /* background-color: #a38ed2; */
  background-image: linear-gradient(125deg,rgb(14, 51, 37),rgb(0, 0, 0));
  background-repeat: no-repeat;
}
.bg-hitam{
  background-color: rgba(21, 207, 136,.5)
}
.bg-merah{
  background-color: rgba(14, 51, 37,.3)
}
.bg-hitam2{
      background-color: rgba(14, 51, 37, 0.3)
    }
    .btnku{
      border: 1px solid rgba(21, 207, 136, 0.3) ;
    }
    .btnku:hover{
      transition: ease-out;
      border:1px solid white;
      background-color: #f0e0c9;
      transform: scale(1.01);
      color: black;
    }
  </style>
  <body class="bg-main-m bg-main"style="height:625px;">
    <div class="d-flex justify-content-center bg-main">
      @yield('container')
    </div>
    



      <script src="{{ asset('') }}bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>