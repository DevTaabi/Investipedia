@extends('Layouts.master')

@section('content')

    <!-- Full Page Image Background Carousel Header -->
    <div id="myCarousel" class="carousel slide"  >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill">
                    <img id="sli" src="{{url('slider1.jpg')}}">
                </div>
            </div>
            <div class="item">
                <div class="fill" >
                    <img id="sli" src="{{url('slider3.jpg')}}">
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img id="sli" src="{{url('slider5.jpg')}}">
                </div>

            </div>
            <div class="item">
                <div class="fill">
                    <img id="sli" src="{{url('slider.jpg')}}">
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img id="sli" src="{{url('slider4.jpg')}}">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div>





    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 8000 //speed
        })
    </script>


@endsection