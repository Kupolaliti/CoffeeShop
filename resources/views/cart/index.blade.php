@extends('layouts.nav')

@section('content')
    <div class="container" style="margin-top: 20px">
        @if (isset($answer) && $answer == true)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Заказ успешно оформлен! <a href="/home" class="alert-link">можете просмотреть его в личном кабинете</a>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h3>Корзина</h3>
        @if(sizeof(\Cart::getContent()) != 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $unit)
                    <tr>
                        <td>{{$unit->name}}</td>
                        <td>{{$unit->price}}</td>
                        <td>
                            {{$unit->quantity}}
                            <a style="margin-left: 10px" href="{{route('add.item', $unit->id)}}"
                               class="btn btn-success ajax">+</a>
                            @if($unit->quantity > 1)
                                <a href="{{route('sub.item', $unit->id)}}" class="btn btn-danger ajax">-</a>
                            @endif
                        </td>

                        <td class="center">
                            <a href="{{route('remove.item', $unit->id)}}" class="btn btn-danger ajax">Удалить</a>
                        </td>
                    </tr>
                @endforeach


            </table>
            @if (Auth::check())
                @if (sizeof($adresses) != 0)
                    <label for="adress_id">Выберите адрес: </label>
                    <select id="adress_id" name="adress_id" style="display: block; margin-bottom: 10px">
                        <option value="{{ $adresses[0]->id }}"> {{ $adresses[0]->adressLine }} </option>
                    </select>
                    <h4>Общая цена: {{\Cart::getTotal()}}</h4><br>

                    @if (isset($countOrders))
                        <h3>Вы потратили в магазине: {{$countOrders[0]->sum}} руб. Ваша
                            скидка {{$countOrders[0]->sum > 5000 ? 5 : 0}}%</h3>
                        <p>При общей сумме покупок 5000 руб скидка составит 5%</p>
                    @endif

                    <form method="POST" action="{{route('saveOrder', $adresses[0]->id)}}">
                        <a href="{{route('clearCart')}}" class="btn btn-danger ajax">Очистить корзину</a>
                        @csrf
                        {{--                                    <a class="btn green">buy</a>--}}
                        <button class="btn btn-success" type="submit" name="action">Оформить заказ</button>
                    </form>
                @else
                    <h3>Для оформления заказа добавьте адрес!</h3>
                    <a href="{{route('adress.create')}}" class="btn btn-danger">Добавить адрес</a>
                @endif
            @else
                <a href="{{route('clearCart')}}" class="btn btn-danger ajax">Очистить корзину</a>
                <h4 style="margin-top: 10px">Для заказа авторизуйтесь или зарегестрируйтесь!</h4>
                <a href="{{ route('login') }}" class="btn btn-info">Авторизация</a>
                <a href="{{ route('register') }}" class="btn btn-info">Регистрация</a>
            @endif
        @else
            <div class="container">
                <h5>Корзина пуста</h5>
            </div>
            {{--        <button class="btn red ajax" type="submit" name="action">Удалить</button>--}}
        @endif
    </div>
@endsection
