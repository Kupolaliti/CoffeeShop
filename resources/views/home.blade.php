@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Здравствуйте, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

{{--    @if(sizeof($data)!=0)--}}
{{--        <h5>Ваши прошлые покупки:</h5>--}}
{{--        <ul class="collapsible">--}}
{{--            @foreach($data as $unit)--}}
{{--                <li>--}}
{{--                    <div class="collapsible-header"><i class="material-icons">shopping_cart</i><b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}</div>--}}
{{--                    <div class="collapsible-body">--}}
{{--                        <h5>Детали заказа:</h5>--}}
{{--                        @foreach($products as $product)--}}
{{--                            <span>--}}
{{--                            @if($product->order_id == $unit->id)--}}
{{--                                    <p><b>Наименование:</b> {{$product -> name}}   <b>Количество:</b> {{$product -> quantity}}   <b>Цена:</b> {{$product -> sellprice}}   <b>Стоимость:</b> {{$product -> sellprice * $product -> quantity}}</p>--}}
{{--                                @endif--}}
{{--                        </span>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}
    @if(sizeof($data)!=0)
        <h5 style="margin-top: 30px">Ваши прошлые покупки:</h5>

    <div id="accordion">
        @foreach($data as $unit)
        <div class="card">
            <div class="card-header" id="heading{{$unit->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$unit->id}}" aria-expanded="false" aria-controls="collapse{{$unit->id}}">
                        <b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}
                    </button>
                </h5>
            </div>
            <div id="collapse{{$unit->id}}" class="collapse" aria-labelledby="heading{{$unit->id}}" data-parent="#accordion">
                <div class="card-body">
                    <h5>Детали заказа:</h5>
                    @foreach($products as $product)
                        <span>
                            @if($product->order_id == $unit->id)
                                <p><b>Наименование:</b> {{$product -> name}}   <b>Количество:</b> {{$product -> quantity}}   <b>Цена:</b> {{$product -> sellprice}}   <b>Стоимость:</b> {{$product -> sellprice * $product -> quantity}}</p>
                            @endif
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
