@extends('layouts.master')

@section('description')
21market - интернет-магазин и сервис совместных покупок в Чувашской Республике
@endsection

@section('title')
21market
@endsection

@section('content')
<div class="container-fluid">

    <div class="row index-bg"></div>
    <div class="row index-text">
        <p> <strong>21market</strong>
            - это интернет-магазин непродовольственной группы товаров.
        </p>
        <p> <strong>Как мы работаем?</strong>
            Мы работаем на покупателя. Вы сообщаете нам, какие товары Вы бы хотели приобретать по наиболее низким ценам, а мы их находим!
        </p>
        <p>
            <strong>Как сообщить нам о том, какой товар вам необходим?</strong>
            Очень просто! Позвонить по телефону
            <strong>(8352) 21-33-77</strong>
            или воспользоваться
            <a href="">
                <strong>формой обратной связи</strong>
            </a>
            .
        </p>
        <p>Интернет-магазин <strong>21market.ru</strong> входит в программу <strong>ЕТК-Клуб</strong>, участники которой имеют особые льготные условия приобретения товаров. С условиями участия Вы можете ознакомиться на <a href="http://etk-club.ru" target="_blank">сайте программы ЕТК-Клуб</a>.</p>
        <hr>
        <h2>Выберите раздел:</h2>
    </div>
    <div class="row">
        <div class="col-sm-6  col-md-6 col-lg-offset-3 col-lg-3">
            <div class="thumbnail">
                <img src="{{URL::to('/src/images/goods-image.jpg')}}" alt="Интернет-магазин товаров">
                <div class="caption">
                    <h3>Интернет-магазин</h3>
                    <p>Здесь вы можете заказать интересующий Вас товар из каталога</p>
                    <p>
                        <a href="{{route('shop')}}" class="btn" role="button">Перейти в Интернет-магазин</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="thumbnail">
                <img src="{{URL::to('/src/images/people-image.jpg')}}" alt="Интернет-магазин товаров">
                <div class="caption">
                    <h3>Портал совместных покупок</h3>
                    <p>К сожалению, данный раздел пока не активен.</p>
                    <p>
                        <a href="#" class="btn" role="button" disabled>Перейти на портал</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection