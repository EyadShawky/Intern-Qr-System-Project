@extends ('layout')

@section('title')
Tatweer Misr | QR
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ ('css/qr.css') }}">
@endsection

@section('content')

<?php

if (isset($_GET['q'])) {
    $id= $_GET['q'];
    $desiredCode = null;
    $desiredUser = null;
    foreach ($userCode as $row) {
        if ($row['user_id'] == $id) {
            $desiredCode = $row;
            break;
        }
    }
    foreach ($userData as $row) {
        if ($row['id'] == $id) {
            $desiredUser = $row;
            break;
        }
    }
    if($desiredCode){
        if($desiredUser){
        echo('
        <div class = "container upper">
            <h1>Hello, '.$desiredUser['Fname'].'</h1>
        </div>');
        }else{
        echo('
        <div class = "container upper">
            <h1>Welcome</h1>
        </div>');
        }
        echo('
        <div class = "container lower">
            <h2>Your number is<br>'.$desiredCode['code'].'</h2>
            <img src="'.$desiredCode['qr_code'].'" width=120 height=120">
        </div>
        ');
    }
    else{
        echo('
        <div class = "container upper">
            <h1>User Not Found.</h1>
        </div>
        <div class = "container lower">
            <h2>Please register using this <a href="http://127.0.0.1:8000">link</a>.</h2>
        </div>
        ');
    }
}else{
    echo('
    <div class = "container upper">
        <h1>User Not Found.</h1>
    </div>
    <div class = "container lower">
        <h2>Please register using this <a href="http://127.0.0.1:8000">link</a>.</h2>
    </div>
    ');
}
?>


@endsection

@section('scripts')
<script>
let logo = document.getElementById('logo');
logo.src = "https://tatweermisr.com/images/logo-white.svg";
</script>
@endsection