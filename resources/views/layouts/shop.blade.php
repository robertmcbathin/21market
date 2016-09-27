<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="mercile55">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('src/images/shop/favicon.ico') }}" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('src/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/affix.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/shop-layout.css') }}" rel="stylesheet">

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

        <!-- Footer -->@include('includes.footer')</div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="{{ URL::to('src/js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $('#close-search-window').on('click', function(){
      $('.product-search-block').hide();
      $('.search-overlay').hide();
    });
  $( function() {
    /*ajax product search*/
    $('#product-search').on('keyup', function(){
      console.log($('#product-search').val());
      $.ajax({
          method: 'POST',
          url: url,
          data: {q: $('#product-search').val(), 
                 _token: token}
        })
        .done(function(msg){
          console.log(JSON.stringify(msg));
          if ((msg['message']) == 'ok'){
            var i = 0, html = '';
            products = msg['products'];
            while (i <= products.length){
              if (products[i].in_stock == 1){
                inStock = '<span class="label label-success">' + 'В наличии' + '</span>'; 
              } else if (products[i].in_stock == 2){
                inStock = '<span class="label label-primary">' + 'Нет в наличии' + '</span>'; 
              }
              html = html + '<div class="container">' 
                          + '<div class="col-md-12">'
                          + '<div class="col-md-6">'
                          + '<a target="_blank" href="/shop/product/' + products[i].id + '/show">' + products[i].name + '</a>' 
                          + '</div>'
                          + '<div class="col-md-3">'
                          + inStock
                          + '</div>'
                          + '<div class="col-md-3">'
                          + products[i].price + ' <i class="fa fa-rub"></i> <span class="label label-warning etk-price" data-toggle="tooltip" data-placement="top" title="Цена для членов ЕТК-Клуба"><img src="/src/images/etk-club-logo-static-32.png" class="etk-label-price"> ' + products[i].price_by_card + '<i class="fa fa-rub"></i> </span>' 
                          + '</div>'
                          + '</div>'
                          + '</div>'
                          + '<hr>'
              $('#search-results').html(html);
              i++;
            }
          };
          if ((msg['message']) == 'success'){
            $('.card-group').removeClass('has-error');
            $('.card-group').addClass('has-success');
          };
        });
    });
    /*--------------*/
    $('#product-search').on('focus', function(){
      $('.product-search-block').css("display", "block");
      $('.search-overlay').css("display", "block");
    });
  } );
  </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('src/js/affix.js') }}"></script>
    <script src="{{ URL::to('src/js/navbar-hider.min.js') }}"></script>
    <script>
        $(document).ready(function() {
          $("nav.navbar-fixed-top").autoHidingNavbar();
          $('.navbar-fixed').autoHidingNavbar('setDisableAutohide', true);
          $('.navbar-fixed').autoHidingNavbar('hide');
          $(document).on('scroll', function() {
            if ($(window).scrollTop() >= 600) {
              $('.navbar-fixed').autoHidingNavbar('show');
            }
            else {
              $('.navbar-fixed').autoHidingNavbar('hide');
            }
          });
         });
        $(function () {
          $('[data-toggle="confirm-tooltip"]').tooltip();
          $('[data-toggle="tooltip"]').tooltip();
          $('[data-toggle="partnershop-1"]').tooltip();
          $('[data-toggle="partnershop-2"]').tooltip();
        });
        $('#product-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
    </script>
</body>

</html>