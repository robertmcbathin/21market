<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
     <img src="{{ $product->path_to_img }}" alt="{{ $product->name }}" class="img-responsive" height="150" >
                        <div class="caption" >
                        <h4>
                              <a href="#">{{ $product->name }}</a>
                          @if ($product->in_stock == 1)
                           <div class="pull-right">
                            <span class="label label-success">В наличии</span>
                          </div>
                          @elseif ($product->in_stock == 2)
                            <div class="pull-right">
                            <span class="label label-primary">На заказ</span>
                          </div>
                          @endif
                          </h4>
                          <hr>
                          <h4 class="pull-left">
                            {{ $product->price }} <i class="fa fa-rub"></i>
                            <span class="label label-warning etk-price" data-toggle="tooltip" data-placement="top" title="Цена для членов ЕТК-Клуба"><img src="{{ URL::to('/src/images/etk-club-logo-static-32.png') }}" alt="" class="etk-label-price"> {{ $product->price_by_card }}<i class="fa fa-rub"></i> </span>
                          </h4>
                          @if ($product->in_stock == 1)
                          <div class="pull-right">
                            <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> В корзину</a>
                          </div>
                          @elseif ($product->in_stock == 2)
                          <div class="pull-right">
                            <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-primary"><i class="fa fa-calendar"></i> Заказать</a>
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