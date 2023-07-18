<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
</head>

<body>

<h1>
    Contact Form
</h1>

<p>First Name : {{$rules['Fname']}}</p>
<p>Email : {{$rules['Email']}}</p>


</body>

</html>



