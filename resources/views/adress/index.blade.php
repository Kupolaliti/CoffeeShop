@extends('layouts.nav')

@section('content')
<div class="container" style="align-items: center; margin-top: 30px">
    <h3>Адреса</h3>
    <a href="{{ route('adress.create') }}" class="btn btn-success" style="margin-bottom: 10px">Создать</a>
    <table class="table">
        <thead>
        <tr>
            @if (Auth::check())
            <th>Имя пользователя</th>
            @endif
            <th>Область</th>
            <th>Город</th>
            <th>Индекс</th>
            <th>Адрес</th>
        </tr>
        </thead>
        <tbody>

            @foreach($adresses as $adress)
                <tr>
                    @foreach($users as $user)
                        @if ($user->id == $adress->user_id)
                            <td>{{$user->name}}</td>
                        @endif
                    @endforeach
                    <td>{{$adress->state}}</td>
                    <td>{{$adress->city}}</td>
                    <td>{{$adress->postCode}}</td>
                    <td>{{$adress->adressLine}}</td>
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->admin == true)
                            <td class="center">
                                <form method="POST" action="{{ route('adress.destroy', $adress) }}">
                                    <a href="{{ route('adress.edit', $adress) }}" class="btn btn-warning">Редактировать</a>
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
</div>
@endsection
