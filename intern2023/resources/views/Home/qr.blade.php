@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ ('css/qr.css') }}">
@endsection

@section('content')

<?php

if (!isset($_GET['q'])) {
    echo 'Not authorized';
}
else{
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
    if($desiredCode && $desiredUser){
        echo('
        <div class = "container upper">
            <h1>Hello, '.$desiredUser['Fname'].'</h1>
        </div>
        <div class = "container lower">
            <h2>Your number is<br>'.$desiredCode['code'].'</h2>
            <img src="'.$desiredCode['qr_code'].'" width=120 height=120">
        </div>
                ');
    }
    else{
        echo 'not found';
    }
}
?>


@endsection

@section('scripts')
<script>
let logo = document.getElementById('logo');
logo.src = "https://tatweermisr.com/images/logo-white.svg";
</script>
@endsection