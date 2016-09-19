<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
  <div class="rectangle">
    @if ($product->partnershop_id == 1)
    <img src="{{URL::to('/src/images/shop/partnershops/1.png')}}" alt="" width="30" height="30" data-toggle="partnershop-1" data-placement="top" title="Заказ будет обработан магазином 21market.ru">
    @elseif ($product->partnershop_id == 2)
    <img src="{{URL::to('/src/images/shop/partnershops/2.png')}}" alt="" width="30" height="30" data-toggle="partnershop-2" data-placement="top" title="Заказ будет обработан магазином my-shop.ru">
    @endif
  </div>
  <div class="left_tri"></div>
     <img src="{{ $product->path_to_img }}" alt="{{ $product->name }}" class="img-responsive" height="150" >
                        <div class="caption" >
                        <h4>
                              <a href="{{route('product.show', ['id' => $product->id])}}">{{ $product->name }}</a>
                          </h4>
                          <hr>
                          <h4 class="pull-left">
                            {{ $product->price }} <i class="fa fa-rub"></i>
                            <span class="label label-warning etk-price" data-toggle="tooltip" data-placement="top" title="Цена для членов ЕТК-Клуба"><img src="{{ URL::to('/src/images/etk-club-logo-static-32.png') }}" alt="" class="etk-label-price"> {{ $product->price_by_card }}<i class="fa fa-rub"></i> </span>
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
                          @if ($product->in_stock == 1)
                          <div class="pull-right">
                            <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> В корзину</a>
                          </div>
                          @elseif ($product->in_stock == 2)
                          <div class="pull-right">
                            @if ((Auth::user()))
                            <a href="{{route('product.remindMe', ['product_id' => $product->id, 'user_id' => Auth::user()->id])}}" class="btn btn-primary" data-toggle="remind-tooltip" data-placement="top" title="При поступлении товара мы Вас об этом оповестим!"><i class="fa fa-calendar"></i> Уведомить</a>
                            @else
                             <a href="#" class="btn btn-primary" data-toggle="remind-tooltip" data-placement="top" title="Функция доступна только для зарегистрированных пользователей" disabled><i class="fa fa-calendar"></i> Уведомить</a>
                            @endif
                          </div>
                          @endif
                          </div>
                          <!-- <div class="ratings">
                            <p class="pull-right">15 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </p>
                          </div> -->
                        </div>
                      </div>