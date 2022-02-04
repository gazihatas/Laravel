<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title ')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    @yield('css')
</head>
<body>

@include('front.navbar')

<div class="container min-vh-100">
    @yield('content')
</div>

<footer class="container-fluid bg-primary">
    <p class="text-center text-white" style="margin-bottom: 0;">
      &copy;  {{ date('Y') }} Tüm hakları saklıdır
    </p>
</footer>

@yield('js ')
<script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.esm.js')}}"></script>
</body>
</html>
