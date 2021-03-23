@extends('layouts.nav')

@section('content')
<div class="container" style="align-items: center">
    <table>
        <thead>
        <tr>
            <th>Имя пользователя</th>
            <th>Область</th>
            <th>Город</th>
            <th>Индекс</th>
            <th>Адрес</th>
        </tr>
        </thead>
        <tbody>

            @foreach($adresses as $adress)
                <tr>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$adress->state}}</td>
                    <td>{{$adress->city}}</td>
                    <td>{{$adress->postCode}}</td>
                    <td>{{$adress->adressLine}}</td>
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->admin == true)
                            <td class="center">
                                <form method="POST" action="{{ route('adress.destroy', $adress) }}">
                                    <a href="{{ route('adress.edit', $adress) }}" class="btn green">Редактировать</a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn red ajax" type="submit" name="action">Удалить</button>
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
