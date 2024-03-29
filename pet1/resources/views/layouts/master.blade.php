<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>


    <title>@yield("title", "PetShop |สัตว์ออนไลน์")</title>
</head>
<body>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>


    <div class="container">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">BikeShop</a>
            </div>
                
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <li><a href="#">หน้าแรก</a></li>
                <li><a href="{{ URL::to('pet') }}">ข้อมูลสัตว์ </a></li>
                <li><a href="#">ประเภทสัตว์</a></li>
                <li><a href="#">รายงาน</a></li>
                </ul>
            </div>
        </nav> 
        @yield('content')
        @if (session('msg'))
            @if(session('ok'))
                <script>
                    toastr.success('{{ session('msg') }}');
                </script>
            @else
                <script>
                    toastr.error('{{ session('msg') }}');
                </script>
            @endif
        @endif
    </div>
    
</body>
</html>