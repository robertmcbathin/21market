@extends('layouts.master')

@section('description')
21market - интернет-магазин и сервис совместных покупок в Чувашской Республике
@endsection

@section('title')
Регистрация | 21market
@endsection

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <h1>Регистрация</h1>
        <hr>
        <form action="{{ route('auth.signup') }}" method="post" id="join-form">
            <div class="owner-credentials">
                <h3>Личные данные</h3>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="second_name">Фамилия</label>
                    <input type="text" id="second_name" name="second_name" maxlength="50" class="form-control" size="50" placeholder=""></div>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="first_name">Имя</label>
                    <input type="text" id="first_name" name="first_name" maxlength="50" class="form-control" size="50" placeholder=""></div>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="third_name">Отчество</label>
                    <input type="text" id="third_name" name="third_name" maxlength="50" class="form-control" size="50" placeholder=""></div>
            </div>
            <div class="owner-private-data">
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="sex">Пол</label>
                    <select class="form-control" name="sex">
                        <option value="U">Не указано</option>
                        <option value="M">муж</option>
                        <option value="F">жен</option>
                    </select>
                </div>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="dob">Дата рождения</label>
                    <input type="date" id="dob" name="dob" maxlength="10" class="form-control" size="10" placeholder="мм/дд/гггг"></div>
                <hr></div>
            <div class="owner-private-data">
                <h3>Контактные данные</h3>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="phone">Телефон</label>
                    <input type="text" id="phone" name="phone" maxlength="15" class="form-control" size="15" placeholder="88007006050"></div>
                <div class="input-group {{ $errors->
                    has('card_number') ? 'has-error' : ''}}">
                    <label for="dob">Электронная почта</label>
                    <input type="email" id="email" name="email" maxlength="50" class="form-control" size="50" placeholder="example@mail.com"></div>
                <hr></div>
            <div class="input-group {{ $errors->
                has('card_number') ? 'has-error' : ''}}">
                <label for="">
                    <input type="checkbox" name="confirm"  id="check" checked="checked" value="Y">
                    Я ознакомлен(а) с
                    <a href="{{ route('privacy') }}"" target="_blank">политикой конфиденциальности</a>
                    и даю своё
                    <a href="{{ route('eula') }}" target="_blank">согласие на обработку персональных данных</a>
                    .
                </label>
            </div>
            {{ csrf_field() }}
            <div class="input-group">
                <button type="submit" class="btn btn-primary btn-block main-btn">Зарегистрироваться</button>
            </div>
        </form>
        <hr>
        <div class="bottom text-center">
            Хотите покупать дешевле? Вы можете
            <a href="http://etk-club.ru"> <b>стать участником программы "ЕТК-Клуб"</b>
            </a>
            и получить привилегированный аккаунт
        </div>
    </div>
</div>
@endsection