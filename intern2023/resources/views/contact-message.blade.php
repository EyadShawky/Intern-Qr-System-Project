<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code Number</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>


    <div class="container align-center">

        <h1>Dear  {{$dataMail['Fname']}},</h1>
        <h4>We hope this message finds you well! We wanted to reach out to you regarding your recent purchase with us and provide you with your unique code. We value your business and want to ensure you have all the necessary information.</h4>

        <h2>
            National ID / Passport : <span class="bg-test">
                {{$dataMail['id']}}
            </span>
        </h2>
        <h2>
            Code: {{$code}}
        </h2>

        <h4>Please make sure to keep these credentials safe and easily accessible for any future reference or inquiries related to your purchase. If you have any questions or need further assistance, feel free to reach out to our customer support team.</h4>
        <h4>Thank you for choosing our services/products. We genuinely appreciate your trust and patronage. We are always here to assist you further!</h4>

    </div>

    <h3>
    Best regards,
    </h3>

    <h1>Tatweer Misr</h1>
    <h2><a href="https://tatweermisr.com/">tatweermisr.com</a></h2>



</body>

</html>