@extends('layouts.master')

@section('description')
21market - интернет-магазин и сервис совместных покупок в Чувашской Республике
@endsection

@section('title')
21market
@endsection

@section('content')
<div class="row">
       <div class="col-md-offset-4 col-md-3">
                            Войти при помощи:
                            <div class="text-center login-choice">
                                <div class="btn-group" role="group" aria-label="...">
                                   <button type="button" class="btn btn-primary main-btn" id="phone-entry"><i class="fa fa-phone"></i></button>
                                   <button type="button" class="btn btn-primary main-btn active" id="email-entry"><i class="fa fa-at"></i></button>
                                   <button type="button" class="btn btn-primary main-btn" id="card-entry"><i class="fa fa-credit-card"></i></button>
                                 </div>
                            </div>
                                 <form method="POST" action="/auth/login" id="login-nav">
                                        <div class="form-group" id="email-input">
                                             <label class="sr-only" for="email">Электронная почта</label>
                                             <input type="email" name="email" class="form-control" id="email" placeholder="Электронная почта" value="{{ old('email') }}">
                                        </div>

                                        <div class="form-group" id="phone-input" style="display:none;">
                                             <label class="sr-only" for="phone">Номер телефона</label>
                                             <input type="text" name="phone" class="form-control" id="phone" placeholder="Номер телефона" value="{{ old('phone') }}">
                                        </div>

                                        <div class="card-input" id="card-input" style="display:none;">
                                        <div class="form-group"" >
                                             <label class="sr-only" for="card_serie">Серия</label>
                                             <input type="text" size="2" maxlength="3" name="card_serie" class="form-control" id="card_serie" placeholder="Серия" value="{{ old('card_serie') }}">
                                        </div>
                                        <div class="form-group"">
                                             <label class="sr-only" for="card_number">Номер карты</label>
                                             <input type="text" size="9" maxlength="15" name="card_number" class="form-control" id="card_number" placeholder="Номер" value="{{ old('card_number') }}">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="sr-only" for="password">Пароль</label>
                                             <input type="password" class="form-control" id="password" placeholder="Пароль" required name="password">
                                             <div class="help-block text-right"><a href="">Забыли пароль?</a></div>
                                        </div>
                                        <div class="checkbox">
                                             <label>
                                             <input type="checkbox"> Запомнить меня
                                             </label>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <input type="hidden" name="auth_type" value="2" id="auth_type">
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-block main-btn">Войти</button>
                                        </div>
                                 </form>
                            <div class="bottom text-center">
                                Нет аккаунта? Вы можете <a href="#"><b>завести обычный аккаунт</b></a> или <a href=""><b>стать участником программы "ЕТК-Клуб"</b></a> и получить привилегированный аккаунт
                            </div>
                        </div>
                 </div>
@endsection