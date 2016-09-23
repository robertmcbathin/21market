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
        </div>

        <div class="col-md-9">
                  <ol class="breadcrumb">
                    <li><a href="{{ route('shop') }}">Главная</a></li>
                    <li><a href="/shop/category/{{ $bc_category->id }}/show"">{{ $bc_category->name }}</a></li>
                    <li class="active">{{ $subcategory->name }}</li>
                  </ol>
              <hr>

              <h1>{{$subcategory->name}}</h1>
            <div class="row categories">
                    @foreach ($products as $product)
                        @include('sections.product_thumbnail')
                    @endforeach

            </div>

        </div>

    </div>

</div>
@endsection