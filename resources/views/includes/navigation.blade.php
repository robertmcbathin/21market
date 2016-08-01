<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ URL::to('src/images/21market-logo.png') }}" alt="" width="30px"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">О компании</a>
                </li>
                <li>
                    <a href="#">Как заказать?</a>
                </li>
                <li>
                    <a href="#">Доставка</a>
                </li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
        @if (Auth::user() == NULL)
        <li>
          <a href="/auth/login" ><b>Вход</b></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     
                </li>
            </ul>
        </li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{Auth::user()->first_name}}</b> <b>{{Auth::user()->second_name}}</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     <a href="/auth/logout">Выйти</a>
                </li>
            </ul>
        </li>
        @endif
      <!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Вход</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     
                </li>
            </ul>
        </li> -->
      </ul>
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