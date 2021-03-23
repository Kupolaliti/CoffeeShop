@extends('layouts.nav')

@section('content')

    <div class="container">
        <h4>Создание товара</h4>
        <form method="POST" @if (isset($adress)) action="{{ route('adress.update', $adress) }}"
              @else
              action="{{ route('adress.store') }}" @endif>
            {{ isset($product) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="state">Область</label>
                <input class="form-control" type="text" id="state" name="state" value="{{ old('state', isset($adress) ? $adress->state : null) }}">
            </div>

            <div class="form-group">
                <label for="city">Город</label>
                <input class="form-control" type="text" id="city" name="city" value="{{ old('city', isset($adress) ? $adress->city : null) }}">
            </div>

            <div class="form-group">
                <label for="postCode">Индекс</label>
                <input class="form-control" type="text" id="postCode" name="postCode" value="{{ old('postCode', isset($adress) ? $adress->postCode : null) }}">
            </div>

            <div class="form-group">
                <label for="adressLine">Адрес</label>
                <input class="form-control" type="text" id="adressLine" name="adressLine" value="{{ old('adressLine', isset($adress) ? $adress->adressLine : null) }}">
            </div>
            {{--            <div class="form-group">--}}
            {{--                <div class="input-field">--}}
            {{--                    <label for="description">Описание</label>--}}
            {{--                    <textarea name="description" id="description" class="materialize-textarea form-control" data-length="120">{{ old('description', isset($product) ? $product->description : null) }}</textarea>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <label for="user_id">Категория товара</label>
            <select id="user_id" name="user_id" style="display: block; margin-bottom: 10px">
                <option selected value="{{ old('user_id', isset($adress) ? $adress->user_id : null) }}">{{isset($adress) ? Auth::user()->name : null}}</option>
                <option value="{{ Auth::user()->id }}"> {{ Auth::user()->name }} </option>
            </select>

            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit"
                        name="action">{{ isset($adress) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection

