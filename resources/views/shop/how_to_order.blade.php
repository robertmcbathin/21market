@extends('layouts.shop')

@section('description')
Как заказать в интернет-магазине 21market.ru
@endsection

@section('title')
Как заказать
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">@include('sections.left-sidebar')</div>

    <div class="col-md-9">
      <div class="row">
        <h1>Как заказать</h1>
        <p>На данный момент мы предоставляем Вам возможность заказа товара <strong>через сайт</strong> и по телефону <strong>(8352) 21-33-77</strong></p>
      </div>
    </div>

  </div>
</div>
@endsection