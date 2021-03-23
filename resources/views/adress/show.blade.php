@extends('layouts.menu')

@section('content')
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('product') }}">category Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('product') }}">View All categorys</a></li>
                <li><a href="{{ URL::to('product/create') }}">Create a category</a>
            </ul>
        </nav>

        <h1>Showing {{ $product->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $product->name }}</h2>
            <p>
                <strong>Name:</strong> {{ $product->name }}<br>
                <strong>Desc:</strong> {{ $product->description }}
            </p>
        </div>

    </div>
@endsection
