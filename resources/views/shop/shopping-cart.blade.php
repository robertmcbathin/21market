@extends('layouts.shop')

@section('description')
21market - корзина покупателя
@endsection

@section('title')
Корзина - 21market
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">@include('sections.left-sidebar')</div>

    <div class="col-md-9">
    @if (Session::has('success-order-confirm'))
      <div id="order-message" class="alert alert-success">
        {{ Session::get('success-order-confirm') }}
      </div>
      @endif
      @if(Session::has('cart'))
      <div class="row">
        <h1>Корзина</h1>
        <div class="col-sm-12 col-md-12">
          <table class="table">
            <tr>
              <th>Наименование</th>
              <th>Цена</th>
              <th>Количество</th>
              <th></th>
            </tr>
            @foreach ($products as $product)
            <tr>
              <td> <strong>{{ $product['item']['name'] }}</strong>
              </td>
              <td>{{ $product['price'] }}</td>
              <td>{{ $product['qty'] }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                    Действие
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Убрать 1</a>
                    </li>
                    <li>
                      <a href="{{route('product.remove', ['id' => $product['item']['id']]) }}">Убрать все</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-md-6 pull-right"> 
          <h3 class="pull-right"><strong>Итого: {{ $totalPrice }} <i class="fa fa-rub"></i></strong></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 pull-right">
          @if (Auth::user())
          <a href="{{ route('shop.confirm')}}" class="btn btn-success pull-right">Подтвердить</a>
          @else
          <a href="{{ route('shop.fast-confirm')}}" class="btn btn-warning pull-right" disabled data-toggle="confirm-tooltip" data-placement="top" title="Если у Вас есть учетная запись, Вы можете авторизоваться. Или воспользуйтесь функцией быстрого заказа">Подтвердить</a>
          <a href="{{ route('shop.fast-confirm')}}" class="btn btn-success pull-right" >Быстрый заказ</a>
          @endif
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <h2>В корзине нет товаров</h2>
        </div>
      </div>
      @endif
    </div>

  </div>
</div>
@endsection