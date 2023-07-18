<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/png" href="/images.png"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/welcome.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/download.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">

    @yield('page-style')
</head>

<body class="body-style">

<!-- Image and text -->
<nav class="navbar navbar-light ">
  <a class="navbar-brand m-auto" href="/">
    <img id="logo" src="/Tatwwer-Misr.jpg" class="d-inline-block align-top" alt="">
  </a>
</nav>

<div  ></div> @yield('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>      
  function checkIfYes() {
      if (document.getElementById('defect').value == 'id') {
        document.getElementById('extraId').style.display = '';
        document.getElementById('natId').disabled = false;
        document.getElementById('extra').style.display = 'none';
        document.getElementById('passport').removeAttribute("required");
      } else if(document.getElementById('defect').value == 'pass') {
        document.getElementById('extra').style.display = '';
        document.getElementById('passport').disabled = false;
        document.getElementById('extraId').style.display = 'none';
        document.getElementById('natId').removeAttribute("required");
  }
  else{
    document.getElementById('extraId').style.display = 'none';
    document.getElementById('extra').style.display = 'none';
  }
}
</script>
@yield('scripts')
</body>

</html>
