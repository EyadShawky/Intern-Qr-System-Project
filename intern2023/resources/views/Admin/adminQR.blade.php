@extends ('layout')

@section('title')
Tatweer Misr | Admin QR
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ ('../../css/adminqr.css') }}">
@endsection

@section('content')

<?php

if (isset($_GET['id'])){
    $i =0;
    for($i; $i<count($userCode); $i++){
        if($userCode[$i]['user_id'] == $id){
            break;
        }
    }
    if($i<count($userCode)){
        echo('
        <div class = "container upper">
            <h2>Name: '.$userData[$i]['Fname'].' '.$userData[$i]['Lname'].'</h2>
            <h2>Number: '.$userCode[$i]['code'].'</h2>
            <img src="'.$userCode[$i]['qr_code'].'" width=120 height=120">
        </div>
        <div class="container lower">
            <table class="table">
                <thead class="thead-light">
                <tr>
                <th scope="col">First</th>
                <td class="fname">
                '.$userData[$i]['Fname'].'
                </td>
                </tr>
                <tr>
                <th scope="col">Last</th>
                <td>
                '.$userData[$i]['Lname'].'
                </td>
                </tr>
                <tr>
                <th scope="col">ID</th>
                <td>
                '.$userCode[$i]['user_id'].'
                </td>
                </tr>
                <tr>
                <th scope="col">Phone</th>
                
                <td>
                '.$userData[$i]['Phone'].'
                </td>
                </tr>

                <tr>
                <th scope="col">E-mail</th>
                    <td>
                    '.$userData[$i]['Email'].'
                    </td>
                    </tr>
                </tr>
                </thead>
            </table>
        </div>
                ');
    }
    else{
        echo('
        <div class = "container upper">
            <h1>User Not Found.</h1>
        </div>
        <div class = "container lower">
        <br><br>
            <h2>Please register using this <a href="http://127.0.0.1:8000">link</a>.</h2>
            <br><br>
            <h2>Or search again using this <a href="http://127.0.0.1:8000/admin/pdRkAAT+XxepOb8drasiSw==">link</a>.</h2>
        </div>
        ');
    }
}else{
    echo('
    <div class = "container upper">
        <h1>ID Not Found.</h1>
    </div>
    <div class = "container lower">
    <br><br>
        <h2>Please register using this <a href="http://127.0.0.1:8000">link</a>.</h2>
        <br><br>
        <h2>Or search again using this <a href="http://127.0.0.1:8000/admin/pdRkAAT+XxepOb8drasiSw==">link</a>.</h2>
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