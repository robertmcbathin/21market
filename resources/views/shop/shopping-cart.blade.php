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
          <div class="col-sm-6 col-md-6">
              <ul class="list-group">
                  @foreach ($products as $product)
                    <li class="list-group-item">
                        <span class="badge">{{ $product['qty'] }}</span>
                        <strong>{{ $product['item']['name'] }}</strong>
                        <span class="label label-success">{{ $product['price'] }}</span>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Reduce by 1</a></li>
                                <li><a href="#">Reduce All</a></li>
                            </ul>
                        </div>
                    </li>
                  @endforeach
              </ul>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-6 col-md-6">
            <strong>Total: {{ $totalPrice }}</strong>
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-sm-6 col-md-6">
            <button type="button" class="btn btn-success">Checkout</button>
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