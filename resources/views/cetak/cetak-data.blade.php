<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static{
            position: relative;
            border: 1px solid black;
        }
    </style>
    <title>Cetak Laporan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Cetak Laporan</b></p>
        <table class="static" align="center" rules="all" border="1px" padding="" style="width: 98%">
            @yield('conten')
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>