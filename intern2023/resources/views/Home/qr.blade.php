@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

<?php

if (!isset($_GET['q'])) {
    echo 'Not authorized';
}
else{
    $id= $_GET['q'];
    echo $id." : ";
    echo $userData;
}
?>
    <div class="header">
        <h1> Hello,  </h1>
    </div>

@endsection