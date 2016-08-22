@extends('layouts.shop')

@section('description')
Профиль | 21market
@endsection

@section('title')
Профиль - 21market
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">@include('sections.left-sidebar')</div>

    <div class="col-md-9">
      <h1>Личный кабинет</h1>
      <hr>
      <h2>Мои заказы</h2>
      @foreach ($orders as $order)
      <div class="panel panel-default">
        <div class="panel-body">
          <ul class="list-group">
          @foreach ($order->cart->items as $item)
            <li class="list-group-item">
              <span class="badge">{{$item['price']}} <i class="fa fa-rub"></i></span>
              {{$item['item']['name']}} | {{ $item['qty'] }} шт.
            </li>
            @endforeach
          </ul>
        </div>
        <div class="panel-footer">
          <strong>Итого: {{ $order->cart->totalPrice }} <i class="fa fa-rub"></i></strong>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
@endsection