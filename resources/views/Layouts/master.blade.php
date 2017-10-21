<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="invv.png" type="favicon/ico" />
    <!-- Latest compiled and minified CSS -->
    {{Html :: script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}
    {{Html :: style('vendor/bootstrap/css/bootstrap.css')}}
    {{Html :: style('vendor/bootstrap/css/bootstrap.min.css') }}
    {{Html :: style('vendor/bootstrap/css/full-slider.css') }}
    {{Html :: script('vendor/jquery/jquery.js')}}
    {{Html :: script('vendor/jquery/jquery.min.js')}}
    {{Html :: script('vendor/jquery/jquery-1.7.js')}}
    {{Html :: script('vendor/jquery/jquery-1.11.min.js')}}
    {{Html :: script('vendor/bootstrap/js/bootstrap.js')}}
    {{Html :: script('vendor/bootstrap/js/bootstrap.min.js')}}
    {{Html :: script('js/app.js')}}
    {{Html :: script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
    {{Html :: script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}
    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->

    <style>
        #bk{
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #sli{
            width: 1150px;
            height: 440px;
        }
    </style>


</head>
<body style="background-color:#F1F5F6;" id="bk">
@include('Includes.header')
<div class="container" >

    @yield('content')
</div>
@include('Includes.footer')
</body>
</html>
