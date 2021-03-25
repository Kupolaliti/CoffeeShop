@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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

    @if(sizeof($data)!=0)
        <h5>Ваши прошлые покупки:</h5>
        <ul class="collapsible">
            @foreach($data as $unit)
                <li>
                    <div class="collapsible-header"><i class="material-icons">shopping_cart</i><b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}</div>
                    <div class="collapsible-body">
                        <h5>Детали заказа:</h5>
                        @foreach($products as $product)
                            <span>
                            @if($product->order_id == $unit->id)
                                    <p><b>Наименование:</b> {{$product -> name}}   <b>Количество:</b> {{$product -> quantity}}   <b>Цена:</b> {{$product -> sellprice}}   <b>Стоимость:</b> {{$product -> sellprice * $product -> quantity}}</p>
                                @endif
                        </span>
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    @if(sizeof($data)!=0)
        <h5>Ваши прошлые покупки:</h5>
    <div id="accordion">
        @foreach($data as $unit)
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
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
