@extends('layouts.shop')

@section('description')
21market - интернет-магазин и сервис совместных покупок в Чувашской Республике
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
           <!-- <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default active" id="shop-button">
                    <a href="/shop">Магазин</a>
                </button>
                <button type="button" class="btn btn-default" id="purchase-button">
                    <a href="/sp">Совместные покупки</a>
                </button>
            </div>-->
            <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix">
                <ul class="nav bs-docs-sidenav">
                    @foreach ($categories as $category)
                    <li class="">
                        <a href="#{{ strtr($category->name, ' ', '_') }}">{{ $category->name }}</a>
                        <ul class="nav">
                            @foreach ($subcategories as $subcategory)
                            @if ($subcategory->category_id == $category->id)
                            <li class="">
                                <a href="#{{ strtr($subcategory->name, ' ', '_') }}">{{ $subcategory->name }}</a>
                            </li>
                            @endif
                          @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <a class="back-to-top" href="#top"> <i class="fa fa-arrow-up"></i>
                    Наверх
                </a>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-6 phone-holder">
                    <p> <i class="fa fa-phone"></i>(8352) 21-33-77  <button class="btn btn-primary">Заказать обратный звонок!</button></p>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Поиск товара...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
              </div>
              <hr>
            <div class="row carousel-holder" id="perfume">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($banners as $banner)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$banner->
                                order}}" class="{{ ($banner->order == 1) ? 'active' : '' }}">
                            </li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($banners as $banner)
                            <div class="item active">
                                <img class="slide-image" src="{{$banner->
                                path_to_img}}" alt="" width="800" height="300">
                                <div class="carousel-caption">
                                    <h3>{{ $banner->title }}</h3>
                                    <p>{{ $banner->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>
            @foreach ($categories as $category)
            <hr>
            <div class="row categories" id="{{strtr($category->
                name, ' ', '_')}}">
                <h1>{{ $category->name }}</h1>
                @foreach ($subcategories as $subcategory)
                @if ($subcategory->category_id == $category->id)
                <div class="row" id="{{strtr($subcategory->
                    name, ' ', '_')}}">
                    <h2>{{ $subcategory->name }}</h2>
                    @foreach ($products as $product)
                    @if ($product->subcategory_id == $subcategory->id)
                        @include('sections.product_thumbnail')
                    @endif
                    @endforeach
                </div>
                @endif
              @endforeach
            </div>
            @endforeach

            <div class="row" id="women-perfume">

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption" >
                            <h4 class="pull-right">$24.99</h4>
                            <h4>
                                <a href="#">First Product</a>
                            </h4>
                            <p>
                                See more snippets like this online store item at
                                <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>
                                .
                            </p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">15 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$64.99</h4>
                            <h4>
                                <a href="#">Second Product</a>
                            </h4>
                            <p>
                                This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">12 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$74.99</h4>
                            <h4>
                                <a href="#">Third Product</a>
                            </h4>
                            <p>
                                This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">31 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4>
                                <a href="#">Fourth Product</a>
                            </h4>
                            <p>
                                This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">6 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/320x150" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4>
                                <a href="#">Fifth Product</a>
                            </h4>
                            <p>
                                This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">18 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h4>
                        <a href="#">Like this template?</a>
                    </h4>
                    <p>
                        If you like this template, then check out
                        <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a>
                        on how to build a working review system for your online store!
                    </p>
                    <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection