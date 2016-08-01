<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="mercile55">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('src/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/affix.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/purchasing-layout.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('includes.navigation')

    <!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        @include('includes.footer')

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="{{ URL::to('src/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('src/js/affix.js') }}"></script>

</body>

</html>
