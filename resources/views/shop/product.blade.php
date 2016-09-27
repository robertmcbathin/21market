@extends('layouts.shop')

@section('keywords')
{{ $product->keywords }}
@endsection
@section('description')
{{ $product->description }}
@endsection

@section('title')
21market
@endsection

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-3">
      <div class="left-nav">
        <div id="logo" class="left-nav"></div>
      </div>
    </div>
    <div class="col-md-9">
      <ol class="breadcrumb">
        <li>
          <a href="{{ route('shop') }}">Главная</a>
        </li>
        <li>
          <a href="/shop/category/{{ $bc_category->id }}/show"">{{ $bc_category->name }}</a>
        </li>
        <li>
          <a href="/shop/subcategory/{{ $bc_subcategory->id }}/show">{{ $bc_subcategory->name }}</a>
        </li>
        <li class="active">{{ $product->name }}</li>
      </ol>
      <hr>
      <div class="thumbnail one-product">
        <div class="rectangle">
          @if ($product->partnershop_id == 1)
          <img src="{{URL::to('/src/images/shop/partnershops/1.png')}}" alt="" width="30" height="30" data-toggle="partnershop-1" data-placement="top" title="Заказ будет обработан магазином 21market.ru">
          @elseif ($product->partnershop_id == 2)
          <img src="{{URL::to('/src/images/shop/partnershops/2.png')}}" alt="" width="30" height="30" data-toggle="partnershop-2" data-placement="top" title="Заказ будет обработан магазином my-shop.ru">@endif</div>
        <div class="left_tri"></div>
        <img src="{{ $product->
        path_to_img }}" alt="" height="300">
        <div class="caption-full">
          <h4>
            <a href="">{{$product->name}}</a>
          </h4>
          <p>{{$product->short_description}}</p>

          <div class="product-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="product-tabs">
              <li role="presentation" class="active">
                <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Описание</a>
              </li>
              <li role="presentation">
                <a href="#attributes" aria-controls="attributes" role="tab" data-toggle="tab">Характеристики</a>

              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="description">
                <p>{{$product->long_description}}</p>
              </div>
              <div role="tabpanel" class="tab-pane" id="attributes">
                @if ($attributes !== NULL)
                <table class="table table-striped">
                  <thead></thead>
                  <tbody>
                    @foreach ($attributes as $attribute)
                    <tr>
                      <td>{{ $attribute->name }}</td>
                      <td>{{ $attribute->value }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>

          </div>
          <hr>
          @foreach ($tags as $tag)
          <span class="label label-primary">{{ $tag->name }}</span>
          @endforeach
          <hr>
          <div  class="product-footer">
            <h4 class="pull-left">
              {{ $product->price }} <i class="fa fa-rub"></i>
              <span class="label label-warning etk-price" data-toggle="tooltip" data-placement="top" title="Цена для членов ЕТК-Клуба">
                <img src="{{ URL::to('/src/images/etk-club-logo-static-32.png') }}" alt="" class="etk-label-price">{{ $product->price_by_card }}&nbsp;<i class="fa fa-rub"></i>&nbsp;
              </span>
            </h4>
            @if ($product->in_stock == 1)
            <div class="pull-right">
              <span class="in-stock">В наличии</span>
            </div>
            @elseif ($product->in_stock == 2)
            <div class="pull-right">
              <span class="">Нет в наличии</span>
            </div>
            @endif
            <br>
            @if ($product->in_stock == 1)
            <div class="pull-right">
              <a href="{{route('product.addToCart', ['id' =>
                $product->id])}}" class="btn btn-success">
                <i class="fa fa-shopping-cart"></i>
                В корзину
              </a>
            </div>
            @elseif ($product->in_stock == 2)
            <div class="pull-right">
              @if ((Auth::user()))
              <a href="{{route('product.remindMe', ['product_id' =>
                $product->id, 'user_id' => Auth::user()->id])}}" class="btn btn-primary" data-toggle="remind-tooltip" data-placement="top" title="При поступлении товара мы Вас об этом оповестим!">
                <i class="fa fa-calendar"></i>
                Уведомить
              </a>
              @else
              <a href="#" class="btn btn-primary" data-toggle="remind-tooltip" data-placement="top" title="Функция доступна только для зарегистрированных пользователей" disabled>
                <i class="fa fa-calendar"></i>
                Уведомить
              </a>
              @endif
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection