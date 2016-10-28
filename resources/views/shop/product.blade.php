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
          <div class="ratings">
                  <p class="pull-right"> Отзывов: {{$product->rating_count}}</p>
                  <p>
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($product->rating_cache, 1)}}
                  </p>
              </div>
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

      <div class="well" id="reviews-anchor">
              <div class="row">
                <div class="col-md-12">
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>Упс, что-то пошло не так:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Ваш отзыв отправлен!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Ваш отзыв удален!</h5>
                    </div>
                  @endif
                </div>
              </div>
              <div class="text-right">
                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Оставить отзыв</a>
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                  {{Form::open()}}
                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                  {{Form::hidden('user_id', $user_id) }}
                  {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Оставьте свой отзыв здесь...'))}}
                  <div class="text-right">
                    <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Отмена</a>
                    <button class="btn btn-success btn-lg" type="submit">Отправить</button>
                  </div>
                {{Form::close()}}
                </div>
              </div>
              @foreach($reviews as $review)
              <hr>
                <div class="row">
                  <div class="col-md-12">
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor

                    {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 
                    
                    <p>{{{$review->comment}}}</p>
                  </div>
                </div>
              @endforeach
              {{ $reviews->links()}}
            </div>
    </div>

  </div>

</div>
@endsection