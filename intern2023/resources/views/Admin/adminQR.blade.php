@extends ('layout')

@section('title')
Tatweer Misr Admin
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ ('../../css/adminqr.css') }}">
@endsection

@section('content')

<?php

if (!isset($_GET['id'])) {
    echo 'Not authorized';
}
else{
    $id= $_GET['id'];
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
            <h2>Name: '.$desiredUser['Fname'].' '.$desiredUser['Lname'].'</h2>
            <h2>Number: '.$desiredCode['code'].'</h2>
            <img src="'.$desiredCode['qr_code'].'" width=120 height=120">
        </div>
        <div class="container lower">
            <table class="table">
                <thead class="thead-light">
                <tr>
                <th scope="col">First</th>
                <td class="fname">
                '.$desiredUser['Fname'].'
                </td>
                </tr>
                <tr>
                <th scope="col">Last</th>
                <td>
                '.$desiredUser['Lname'].'
                </td>
                </tr>
                <tr>
                <th scope="col">ID</th>
                <td>
                '.$desiredUser['id'].'
                </td>
                </tr>
                <tr>
                <th scope="col">Phone</th>
                
                <td>
                '.$desiredUser['Phone'].'
                </td>
                </tr>

                <tr>
                <th scope="col">E-mail</th>
                    <td>
                    '.$desiredUser['Email'].'
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
}
?>


@endsection

@section('scripts')
<script>
let logo = document.getElementById('logo');
logo.src = "https://tatweermisr.com/images/logo-white.svg";
</script>
@endsection