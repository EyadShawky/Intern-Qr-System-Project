<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/png" href="/images.png"/>

    @yield('page-style')
</head>

<body>

<!-- Image and text -->
<nav class="navbar navbar-light ">
  <a class="navbar-brand m-auto" href="#">
    <img src="/Tatwwer-Misr.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>
</nav>

<div></div> @yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>

</html>
