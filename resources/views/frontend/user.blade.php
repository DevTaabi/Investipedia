<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Investipedia</title>
    <link rel="shortcut icon" href="ico.png" type="favicon/ico" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    <script src="{{asset('js/main.js')}}"></script>
{{Html:: style('vendor/bootstrap/css/bootstrap.min.css')}}
{{Html:: style('vendor/metisMenu/metisMenu.min.css')}}
<!-- Menu CSS -->
    <!-- social links css-->
{{Html:: style('vendor/bootstrap-social/bootstrap-social.css')}}
{{Html:: style('vendor/bootstrap-social/bootstrap-social.less')}}
{{Html:: style('vendor/bootstrap-social/bootstrap-social.scss')}}
<!--end social links-->

{{Html:: style('vendor/metisMenu/metisMenu.min.css')}}
<!-- Custom CSS -->
{{Html:: style('vendor/dist/css/sb-admin-2.css')}}

<!-- Morris Charts CSS -->
{{Html:: style('vendor/morrisjs/morris.css')}}

<!-- Custom Fonts -->
    {{Html:: style('vendor/font-awesome/css/font-awesome.min.css')}}

    {{Html:: script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
    {{Html:: style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}
    <![endif]-->
    <!-- jQuery -->
{{html::script('vendor/jquery/jquery.min.js')}}

<!-- Bootstrap Core JavaScript -->
{{html::script('vendor/bootstrap/js/bootstrap.min.js')}}

<!-- Metis Menu Plugin JavaScript -->
{{html::script('vendor/metisMenu/metisMenu.min.js')}}
<!-- Morris Charts JavaScript -->
{{html::script('vendor/raphael/raphael.min.js')}}
{{html::script('vendor/morrisjs/morris.min.js')}}
{{html::script('vendor/data/morris-data.js')}}


{{html::script('vendor/dist/js/sb-admin-2.js')}}
{{html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <style>
        #bk{
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #cover{
            background-image: url("blue-bk.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #btn-me{
            width: 180px;
            margin-left: 8%;
            font-weight: bold;
            font-size: 18px;
        }
        #profile{
            background-image: url("Profile-bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }



    </style>
</head>

<body  style=" font-family: 'Josefin Slab', serif;font-size: 18px ;background-color:#F1F5F6;">

<div id="wrapper">

    <!-- Navigation -->


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#0A93F1;">


    @include('frontend.common.header')
    {{--<!-- /.navbar-header -->--}}

    @include('frontend.common.header_links')

    <!-- /.navbar-top-links -->
        @include('frontend.common.side_menu')
    </nav>
    <!-- /.navbar-static-side -->


    <div style="background-color:#F1F5F6;" id="page-wrapper">
        <a href="{{route('news-feed')}} " title="Home"><h4 class="page-header" style="margin-top:7%">
                <p class="fa fa-home"> Home </p>
            </h4></a>
        <section  id="bk" >
            @yield("main-user-content")

        </section>


    </div>
    <!-- /#page-wrapper -->

</div>
{{--@include('frontend.common.footer')--}}

</body>

</html>
