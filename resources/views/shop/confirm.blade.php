@extends('layouts.shop')

@section('description')
21market - Подтверждение заказа
@endsection

@section('title')
Корзина - 21market
@endsection

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-3">
      @include('sections.left-sidebar')
    </div>

    <div class="col-md-9 confirm">
      @if (Session::has('success-order-confirm'))
      <div id="order-message" class="alert alert-success">
        {{ Session::get('success-order-confirm') }}
      </div>
      @endif
       <h1>Подтверждение заказа</h1>
       <hr>
       <h3>Информация о заказе</h3>
       <table class="table">
            <tr>
              <th>Наименование</th>
              <th>Цена</th>
              <th>Количество</th>
            </tr>
            @foreach ($products as $product)
            <tr>
              <td> <strong>{{ $product['item']['name'] }}</strong>
              </td>
              <td>{{ $product['price'] }}</td>
              <td>{{ $product['qty'] }}</td>
            </tr>
            @endforeach
          </table>
       <hr>
       <h3>Оплата</h3>
       <p>Наличными при получении</p>
       <h3>Способ выдачи</h3>
       <p>Самовывоз (г. Чебоксары, Московский проспект, д.41.1 (офис ООО "ЕТК"))</p>
       <h3>Итого: <strong>{{ $total }} <i class="fa fa-rub"></i></strong></h3>
       <form action="{{ route('shop.confirm.post') }}" method="post">
         <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
         <input type="hidden" value="1" name="payment_type">
         <input type="hidden" value="1" name="delivery_type">
         <input type="hidden" value="1" name="delivery_point">
         <input type="hidden" value="1" name="status">
         {{ csrf_field() }}
         <input type="submit" class="btn btn-success pull-right" value="Отправить заказ">
       </form>
    </div>

</div>

</div>
@endsection