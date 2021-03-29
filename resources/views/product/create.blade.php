@extends('layouts.nav')

@section('content')
    <div class="container" style="margin-top: 30px">
        <h4>Создание товара</h4>
        <form  @if (isset($product)) action="{{ route('product.update', $product) }}"
              @else
              action="{{ route('product.store') }}" @endif  method="POST">
            {{ isset($product) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Название</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', isset($product) ? $product->name : null) }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input class="form-control" type="text" id="price" name="price" value="{{ old('price', isset($product) ? $product->price : null) }}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <input class="form-control" type="text" id="description" name="description" value="{{ old('description', isset($product) ? $product->description : null) }}">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{--            <div class="form-group">--}}
            {{--                <div class="input-field">--}}
            {{--                    <label for="description">Описание</label>--}}
            {{--                    <textarea name="description" id="description" class="materialize-textarea form-control" data-length="120">{{ old('description', isset($product) ? $product->description : null) }}</textarea>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="form-group">
                <label for="picture">Изображение</label>
                <input class="form-control" id="picture" rows="3" name="picture" value="{{ old('picture', isset($product) ? $product->picture : null) }}">
                @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn btn-success" type="submit"
                        name="action">{{ isset($product) ? 'Обновить' : 'Добавить' }}</button>

        </form>
    </div>
@endsection

