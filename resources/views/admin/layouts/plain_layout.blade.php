<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="admin-icon.png" type="favicon/ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ios/fickle-logo-114.png" />


    <title>Investipedia - dashboard</title>
{!! Html :: style('AdminTheme/assets/css/plugins/pace.css') !!}
{{Html::style("backend_assets/css/bootstrap.min.css")}}
{{ Html :: style('AdminTheme/assets/css/bootstrap.min.css') }}
{{Html  :: style('AdminTheme/assets/css/plugins/bootstrap-progressbar-3.1.1.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/jquery-jvectormap.css')}}

{{Html :: style('AdminTheme/assets/css/plugins/amaranjs/jquery.amaran.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/all-themes.css')}}
{{Html :: style('AdminTheme/assets/css/plugins/amaranjs/theme/awesome.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/default.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/blur.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/user.css')}}
{{Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/rounded.css') }}
{{ Html  :: style('AdminTheme/assets/css/plugins/amaranjs/theme/readmore.css')}}
{{Html :: style('AdminTheme/assets/css/plugins/amaranjs/theme/metro.css')}}
{{Html  :: style('AdminTheme/assets/css/style.css')}}
{{ Html  :: style('AdminTheme/assets/css/responsive.css')}}
    {{Html  :: script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
    {{Html  :: script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}

</head>
<body>

<section id="main-container">


    <section id="min-wrapper">
        <div id="main-content">
                <div class="row">
                    <div class="col-md-12">

                        @yield("main-content")


                    </div>
                </div>


            </div>
    </section>
    <div id="change-color">
        <div id="change-color-control">
            <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
        </div>
        <div class="change-color-box">
            <ul>
                <li class="default active"></li>
                <li class="red-color"></li>
                <li class="blue-color"></li>
                <li class="light-green-color"></li>
                <li class="black-color"></li>
                <li class="deep-blue-color"></li>
            </ul>
        </div>
    </div>
</section>


{{Html:: script('AdminTheme/assets/js/color.js')}}
{{Html:: script('AdminTheme/assets/js/lib/jquery-1.11.min.js')}}
{{Html:: script('AdminTheme/assets/js/multipleAccordion.js')}}
{{Html:: script('AdminTheme/assets/js/jquery.easypiechart.min.js')}}

{{Html:: script('AdminTheme/assets/js/pages/layout.js')}}



{{Html:: script('AdminTheme/assets/js/countUp.min.js')}}

{{Html:: script('AdminTheme/assets/js/pages/dashboard.js')}}
</body>
</html>