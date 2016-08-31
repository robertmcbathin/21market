@extends('layouts.callback')

@section('content')
      <div class="container">
      <div class="page-header">
        <img src="{{ URL::to('/src/images/21market-logo-shop-100.png') }}" width="50" alt="21market">
        <h1>Поздравляем!</h1>
      </div>
      <p class="lead">Ваша учетная запись активирована. Для авторизации на портале <a href="http://21market.ru" target="_blank">21market.ru</a> используйте реквизиты, высланные на указанную Вами электронную почту</p>
    </div>
@endsection