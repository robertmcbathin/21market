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
    @if (Session::has('is_success'))
      <div id="order-message" class="alert alert-success">
        Ваш заказ отправлен и скоро будет обработан. Ожидайте подтверждения заказа по телефону
      </div>
    @endif
      
    </div>

  </div>
</div>
@endsection