@extends('layouts.menu')

@section('content')
    <div class="container">
        <h3>Заказ</h3>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Здравствуйте, {{Auth::user()->name}} !
                    </div>
                </div>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>Дата покупки</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>


                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->amount}}</td>

                </tr>



        </table>
    </div>

@endsection
