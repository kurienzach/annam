<!DOCTYPE html>
<html lang="en">
    <head>
        @section('head')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title>annam homely food at your door step</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- icon fonts -->
        <link href="{{ asset('css/et-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animsition.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

        <!-- Owl Carousel Assets -->
        <link href="{{ asset('owl-carousel/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('owl-carousel/owl.theme.css') }}" rel="stylesheet">
        <link href="{{ asset('cubeportfolio/css/cubeportfolio.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
        @show
    </head>
    <body data-spy="scroll" data-target=".navbar">
        <div class="animsition-overlay">
            <div class="wrapper">
            @include('user.header')

            @yield('content')

            @include('user.footer')
            </div>
        </div>

        @section('scripts')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.animsition.min.js') }}"></script>
        <script src="{{ asset('cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/lightbox.js') }}"></script>
        <script src="{{ asset('js/blockets.js') }}"></script>
        <script src="{{ asset('js/lodash.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
        @show
    </body>
</html>
