@extends('layouts.nav')

@section('content')
    <div class="container" style="align-items: center; margin-top: 20px">
        <h3>Напитки</h3>
        <a href="{{ route('product.create') }}" class="btn btn-success" style="margin-bottom: 10px">Создать</a>

        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Описание</th>
                @if (Route::has('login'))
                    @if (Auth::check() && Auth::user()->admin == true)
                        <th></th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>

                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->admin == true)
                            <td class="text-center">
                                <form method="POST" action="{{ route('product.destroy', $product) }}">
                                    <a style="margin-bottom: 5px" href="{{ route('product.edit', $product) }}"
                                       class="btn btn-warning">Редактировать</a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger ajax" type="submit" name="action">Удалить</button>
                                </form>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
@endsection
