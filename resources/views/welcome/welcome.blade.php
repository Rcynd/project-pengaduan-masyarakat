@extends('welcome.layout.master')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="margin-top:10%;">
    <div class="bg-none text-light text-center col-lg-7 ml-4 text-light">
        <h1>
            Selamat Datang! di ADUKEN
        </h1>
        <p>
            aplikasi untuk mengadukan aspirasi masyarakat 
        </p>
    </div>
    <div class="col-lg-4 shadow-md">
        <img src="{{ asset('') }}adminlte/img/download.jpg" width="300" class="img-fluid glass-card" alt="">
    </div>
</div>
@endsection