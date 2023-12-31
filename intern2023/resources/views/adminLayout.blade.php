<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/png" href="/images.png" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/welcome.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/download.png')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


    <style>
        .navbar-nav.m-auto{
            flex-direction: row;
            justify-content: center;
        }

    </style>
    @yield('page-style')
</head>

<body class="body-style">

    <!-- Image and text -->
    <nav class="navbar navbar-light ">
        <a class="navbar-brand m-auto" href="/">
            <img id="logo" src="/Tatwwer-Misr.jpg" class="d-inline-block align-top" alt="Tatwwer-Misr-logo">
        </a>
    </nav>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav m-auto ">
                @if(auth()->user()?->role_id == 1)
                <a class="nav-link text-white" href="/admin/pdRkAAT+XxepOb8drasiSw==">Form Data</a>
                <a class="nav-link text-white" href="/admin/pdRkAAT+XxepOb8drasiSw==/dashboard">Dashboard</a>
                <a class="nav-link text-white" href="/admin/pdRkAAT+XxepOb8drasiSw==/create-admin">Create Admin</a>
                @endif
                <form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/logout')}}" method="post">
                    @csrf
                    <input  type="image" src="/image/logout (1).png" class="icone-style" width="40" height="40" value="logout" >
                </form>
                
            </div>
        </div>
    </nav>

    @endauth

    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function checkIfYes() {
            if (document.getElementById('defect').value == 'id') {
                document.getElementById('extraId').style.display = '';
                document.getElementById('natId').disabled = false;
                document.getElementById('extra').style.display = 'none';
                document.getElementById('passport').removeAttribute("required");
            } else if (document.getElementById('defect').value == 'pass') {
                document.getElementById('extra').style.display = '';
                document.getElementById('passport').disabled = false;
                document.getElementById('extraId').style.display = 'none';
                document.getElementById('natId').removeAttribute("required");
            } else {
                document.getElementById('extraId').style.display = 'none';
                document.getElementById('extra').style.display = 'none';
            }
        }
    </script>
    <script>
        let logo = document.getElementById('logo');
        logo.src = "https://tatweermisr.com/images/logo-white.svg";
    </script>
    @yield('scripts')
</body>

</html>