@extends('layouts.shop')

@section('description')
Пункты самовывоза в магазине 21market.ru
@endsection

@section('title')
Пункты самовывоза
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">@include('sections.left-sidebar')</div>

    <div class="col-md-9">
      <div class="row">
        <h1>Пункты самовывоза</h1>
        <p>Заказав товары и получив уведомление о готовности Вашего заказа, забрать товар Вы сможете в пункте выдачи по адресу <strong>г. Чебоксары, Московский проспект, д.41/1 (ост. улица Кривова)</strong>.</p>
      </div>
    </div>

  </div>
</div>
@endsection