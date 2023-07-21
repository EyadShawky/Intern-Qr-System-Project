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
    $i =0;
    for($i; $i<count($userCode); $i++){
        if($userCode[$i]['user_id'] == $id){
            break;
        }
    }
    if($i<count($userCode)){
        echo('
        <div class = "container upper">
            <h1>Hello, '.$userData[$i]['Fname'].'</h1>
        </div>
        <div class = "container lower">
            <h2>Your number is<br>'.$userCode[$i]['code'].'</h2>
            <img src="'.$userCode[$i]['qr_code'].'" width=120 height=120">
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