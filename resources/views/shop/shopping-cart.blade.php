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

        <div class="col-md-3">
      @include('sections.left-sidebar')
    </div>

    <div class="col-md-9">
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
                        <td><strong>{{ $product['item']['name'] }}</strong></td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['qty'] }}</td>
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Действие <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Убрать 1</a></li>
                                <li><a href="#">Убрать все</a></li>
                            </ul>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </table>
          </div>
      </div>

      <div class="row">
          <div class="col-sm-6 col-md-6">
            <strong>Итого: {{ $totalPrice }}</strong>
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-sm-6 col-md-6">
            <button type="button" class="btn btn-success">Подтвердить</button>
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