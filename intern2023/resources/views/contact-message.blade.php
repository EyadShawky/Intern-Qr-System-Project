<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code Number</title>
</head>

<body>

<h1>
    Hello Dear,
</h1>

<p>National ID/Passpowrt : {{$dataMail['id']}}</p>
<p>Code :  {{$userCode->code}}</p>


</body>

</html>



