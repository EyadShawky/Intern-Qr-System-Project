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
        <div class = "container">
            <h1>Hello, '.$desiredUser['Fname'].'</h1>
            <h2>Here is your Number: '.$desiredCode['code'].'</h2>
            <img src="'.$desiredCode['qr_code'].'" width=120 height=120">
            </div>
            <div class="container">
            <table class="table">
            <thead class="thead-light">
            <tr>
            <th scope="col">First</th>
            <td>
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