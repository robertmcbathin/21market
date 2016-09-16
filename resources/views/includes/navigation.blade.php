<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid m55-header-top">
<div class="container">
 <div class="col-md-6">
     <div class="col-md-8">
     <p><i class="fa fa-phone"></i> (8352) 21-33-77 | 
     <a data-toggle="modal" data-target="#order-call">Заказать обратный звонок!</a></p>

    
     </div>
     <div class="col-md-6"></div>
 </div>
 <div class="col-md-6"> 
 @if (Auth::user() == NULL)
            <div class="col-md-6 text-right">
            <a href="{{ route('product.shoppingCart') }}" >
              <i class="fa fa-shopping-cart"></i> Корзина
              <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
            </a>
            </div>
            <div class="col-md-6 text-right">
          <a href="/login" ><b>Вход</b></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     
                </li>
            </ul>
        <a href="#" class="divider">|</a>
          <a href="/signup" ><b>Регистрация</b></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     
                </li>
            </ul>
            </div>
        @else
        <div class="col-md-6 text-right">
            <a href="{{ route('product.shoppingCart') }}" class="text-center">
              <i class="fa fa-shopping-cart"></i> Корзина
              <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
            </a>
        </div>
        <div class="col-md-6 text-right">
            <a class="dropdown">
            <a href="{{ route('profile') }}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b>{{Auth::user()->first_name}}</b> <b>{{Auth::user()->second_name}}</b> <span class="caret"></span></a>
            <ul  class="dropdown-menu">
                <li>
                     <a href="{{route('profile')}}" >Личный кабинет</a>
                </li>
                <li>
                     <a href="/logout" >Выйти</a>
                </li>
            </ul>
        </a>
        </div>
        @endif
    </div>
    </div>
</div>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-6">
             <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/shop">
                <img src="{{ URL::to('src/images/21market-logo.png') }}" alt="" width="30px"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('shop.about') }}">О магазине</a>
                </li>
                <li>
                    <a href="{{ route('shop.how-to-order') }}">Как заказать?</a>
                </li>
                <li>
                    <a href="{{ route('shop.delivery-points') }}">Пункты самовывоза</a>
                </li>
            </ul>
        </div>
        </div>
        <div class="col-md-6">
                  <div class="input-group m55-search">
                     <input id="product-search" type="text" class="form-control" placeholder="Поиск товара..." size="50">
                     <span class="input-group-btn">
                     <button class="btn btn-default" type="button"> <i class="fa fa-search"></i>
                     </button>
                     </span>
                   </div>
        </div>
        <!-- /.navbar-collapse --> </div>
    <!-- /.container -->
</nav>
<!--
<ul class="nav navbar-nav navbar-right">
    <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="http://etk-admin/src/images/employees/mercile55.jpg" alt="">
            Александр Иванов
            <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
                <a href="/auth/logout"> <i class="fa fa-sign-out pull-right"></i>
                    Выйти
                </a>
            </li>
        </ul>
    </li>
    <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green"></span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
                <a>
                    <span class="image">
                        <img src="images/img.jpg" alt="Profile Image"></span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
            <li>
                <a>
                    <span class="image">
                        <img src="images/img.jpg" alt="Profile Image"></span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
            <li>
                <a>
                    <span class="image">
                        <img src="images/img.jpg" alt="Profile Image"></span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
            <li>
                <a>
                    <span class="image">
                        <img src="images/img.jpg" alt="Profile Image"></span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
            <li>
                <div class="text-center">
                    <a> <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>
</ul> -->