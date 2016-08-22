<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="mercile55">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('src/images/favicon.ico') }}" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('src/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/affix.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/main-style.css') }}" rel="stylesheet">
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

    <!-- Footer -->
    @include('includes.footer')
    <!-- /.container -->
    <!-- jQuery -->
    <script src="{{ URL::to('src/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('src/js/affix.js') }}"></script>
    <script>
   $(document).ready(function(){
    $('#phone-entry').click(function(event){
        event.preventDefault(); 
        $('#email-entry').removeClass('active');
        $('#card-entry').removeClass('active');
        $('#phone-entry').addClass('active');

        $('#email-input').css('display','none');
        $('#card-input').css('display','none');
        $('#phone-input').css('display', 'block');
        $('#auth_type').attr('value', 1);
    });
    $('#email-entry').click(function(event){
        event.preventDefault(); 
        $('#phone-entry').removeClass('active');
        $('#card-entry').removeClass('active');
        $('#email-entry').addClass('active');

        $('#phone-input').css('display','none');
        $('#card-input').css('display','none');
        $('#email-input').css('display', 'block');
        $('#auth_type').attr('value', 2);
    });
    $('#card-entry').click(function(event){
        event.preventDefault(); 
        $('#email-entry').removeClass('active');
        $('#phone-entry').removeClass('active');
        $('#card-entry').addClass('active');

        $('#email-input').css('display','none');
        $('#phone-input').css('display','none');
        $('#card-input').css('display', 'inline-block');
        $('#auth_type').attr('value', 3);
    });
   }) 
</script>
</body>

</html>
