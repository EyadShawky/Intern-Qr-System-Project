<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tatweer misr</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/welcome.css') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/download.png')}}">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">

        <div class="header">
            <h1 > Fill the following fields </h1>
        </div>

        <form class="form-all">
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="text" class="form-control" id="from-group-inputs" placeholder="First Name *" required>
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="text" class="form-control" id="from-group-inputs" placeholder="Last Name *" required>
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="number" class="form-control" id="from-group-inputs" placeholder="National ID / Passport *" required>
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="email" class="form-control" id="from-group-inputs" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="number" class="form-control" id="from-group-inputs" placeholder="Phone Number *" required>
            </div>
<!-- 
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="number" class="form-control" id="from-group-inputs" placeholder="Another phone Number">
            </div> -->
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Submit</button>
            </div>
            
        </form>
    </body>
</html>
