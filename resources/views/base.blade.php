<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <title>IPT CourseWare</title>
</head>
<body>

    @include('nav')

    <div class="container main-container">
        @yield('content')
    </div>

    <footer class = "bg-dark text-white">
        Copyright &copy; 2020. IPT Kenn_CourseWare, Inc. <br>
        All rights reversed.
    </footer>
</body>
</html>
