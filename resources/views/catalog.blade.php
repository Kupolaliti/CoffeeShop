@extends('layouts.nav')

@section('content')
    <div class="container" style="align-items: center; margin-top: 20px">

        <h3>Каталог товаров</h3>
        <div class="row">
            @foreach($products as $product)
                <div class="card col-4" style="padding-top: 3px; margin-bottom: 10px;">
                    <img src="{{$product->picture}}" class="card-img-top" alt="{{$product->name}}"
                         style="max-width: 200px; width: auto; height: auto">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}} : {{$product->price}} руб.</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <a href="{{route('add.item', $product->id)}}" class="btn btn-outline-primary">В корзину</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
