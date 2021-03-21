@extends('layouts.nav')

@section('content')
<div class="container" style="align-items: center">
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Название</th>--}}
{{--            <th>Цена</th>--}}
{{--            <th>Описание</th>--}}
{{--            <th>Категория</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @foreach($products as $product)--}}
{{--            <tr>--}}
{{--                <td>{{$product->name}}</td>--}}
{{--                <td>{{$product->price}}</td>--}}
{{--                <td>{{$product->description}}</td>--}}
{{--                <td>{{$product->category_name}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--    @foreach($products as $product)--}}
{{--    <div class="thumbnail">--}}
{{--        <div class="labels">--}}
{{--        </div>--}}
{{--        <img src="{{$product->picture}}" alt="{{$product->name}}">--}}
{{--        <div class="caption">--}}
{{--            <h3>{{$product->name}}</h3>--}}
{{--            <p>{{$product->price}}</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @endforeach--}}
{{--    <table>--}}

    <div class="row">
        @foreach($products as $product)
{{--            <tr>--}}
{{--            <td>--}}
            <div class="card col-4" style="padding-top: 3px; margin-bottom: 10px;">
                <img src="{{$product->picture}}" class="card-img-top" alt="{{$product->name}}" style="max-width: 200px; width: auto; height: auto">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}} : {{$product->price}} руб.</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="{{route('add.item', $product->id)}}" class="btn btn-outline-primary">В корзину</a>
{{--                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                </div>
            </div>
{{--            </td>--}}
        @endforeach
{{--            </tr>--}}
    </div>

{{--    </table>--}}
</div>
@endsection
