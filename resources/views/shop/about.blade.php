@extends('layouts.shop')

@section('description')
О магазине
@endsection

@section('title')
О магазине
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">@include('sections.left-sidebar')</div>

    <div class="col-md-9">
      <div class="row">
        <h1>О магазине</h1>
        <p><strong>21market.ru</strong> - это интернет-магазин непродовольственной группы товаров широкого ассортимента.</p>
        <p>Магазин создан при поддержке ООО "Единая транспортная карта" в рамках программы лояльности <strong>"ЕТК-Клуб"</strong>, цель которой - объединить пользователей транспортных карт.</p>
        <p>Наш магазин только начинает свою деятельность, и нам бы очень хотелось ориентироваться на Вас, дорогие посетители!</p>
        <p>Мы рассчитываем на Вашу поддержку и хотели бы услышать любое мнение по поводу предлагаемого Вам ассортимента!</p>
      </div>
    </div>

  </div>
</div>
@endsection