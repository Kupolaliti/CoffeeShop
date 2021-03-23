@extends('layouts.nav')

@section('content')
    <div class="container">
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
                            <a style="margin-left: 10px" href="{{route('add.item', $unit->id)}}" class="green waves-effect waves-green btn-flat ajax">+</a>
                            @if($unit->quantity > 1)
                                <a href="{{route('sub.item', $unit->id)}}" class="red waves-effect waves-red btn-flat ajax">-</a>
                            @endif
                        </td>

                        <td class="center">
                            <a href="{{route('remove.item', $unit->id)}}" class="btn red ajax">Удалить</a>
                        </td>
                    </tr>
                @endforeach


        </table> @if (Auth::check())
            <label for="adress_id">Адрес</label>
            <select id="adress_id" name="adress_id" style="display: block; margin-bottom: 10px">
                <option value="{{ $adresses[0]->id }}"> {{ $adresses[0]->adressLine }} </option>
            </select>
            <h4>Общая цена: {{\Cart::getTotal()}}</h4><br>
        <div class="row">

                <form method="POST" action="{{route('saveOrder', $adresses[0]->id)}}">
                    <a href="{{route('clearCart')}}" class="btn red ajax">Очистить корзину</a>
                    @csrf
{{--                                    <a class="btn green">buy</a>--}}
                    <button class="btn green" type="submit" name="action">Оформить заказ</button>
                </form>
            @endif
        </div>


        @else
            <h5>Корзина пуста</h5>
{{--        <button class="btn red ajax" type="submit" name="action">Удалить</button>--}}
        @endif
    </div>
@endsection
