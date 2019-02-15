<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book Store - Book Guide Author, Publication and Store</title>
    <!-- CUSTOM STYLE -->
    <link href="{{URL::asset('Frontend\style.css')}}" rel="stylesheet">
    <!-- THEME TYPO -->
    <link href="{{URL::asset('Frontend\css\themetypo.css')}}" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link href="{{URL::asset('Frontend\css\bootstrap.css')}}" rel="stylesheet">
    <!-- COLOR FILE -->
    <link href="{{URL::asset('Frontend\css\color.css')}}" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link href="{{URL::asset('Frontend\css\font-awesome.min.css')}}" rel="stylesheet">
    <!-- BX SLIDER -->
    <link href="{{URL::asset('Frontend\css\jquery.bxslider.css')}}" rel="stylesheet">

    <link href="{{URL::asset('Frontend\css\bootstrap-slider.css')}}" rel="stylesheet">

    <link href="{{URL::asset('Frontend\css\widget.css')}}" rel="stylesheet">
    <!-- responsive -->
    <link href="{{URL::asset('Frontend\css\responsive.css')}}" rel="stylesheet">
    <!-- Component -->
    <link href="{{URL::asset('Frontend\js\dl-menu\component.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!--WRAPPER START-->
<div class="wrapper kode-home-page">
    @include('Frontend.Layouts.header')

    @yield('content')
    @include('Frontend.Layouts.footer')
    <div class="copyrights">
        <div class="container">
            <p>Copyrights © 2015-16 KodeForest. All rights reserved</p>
            <div class="cards"><img src="images\cards.png" alt=""></div>
        </div>
    </div>
</div>
<!--WRAPPER END-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{URL::asset('Frontend\js\jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{URL::asset('Frontend\js\bootstrap.min.js')}}"></script>
<script src="{{URL::asset('Frontend\js\jquery.bxslider.min.js')}}"></script>
<script src="{{URL::asset('Frontend\js\bootstrap-slider.js')}}"></script>
<script src="{{URL::asset('Frontend\js\waypoints.min.js')}}"></script>
<script src="{{URL::asset('Frontend\js\jquery.counterup.min.js')}}"></script>
<script src="{{URL::asset('Frontend\js\dl-menu\modernizr.custom.js')}}"></script>
<script src="{{URL::asset('Frontend\js\dl-menu\jquery.dlmenu.js')}}"></script>
<script src="{{URL::asset('Frontend\js\classie.js')}}"></script>
<script src="{{URL::asset('Frontend\js\functions.js')}}"></script>
</body>
</html>
