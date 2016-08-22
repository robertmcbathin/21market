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
            @include('sections.desires')
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
            @include('sections.search')
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
                <div class="row">
                    <a href="/shop/subcategory/{{ $subcategory->id }}/show" class="btn btn-primary pull-right">Показать все</a>
                </div>
                @endif
              @endforeach
            </div>
            @endforeach

        </div>

    </div>

</div>
@endsection