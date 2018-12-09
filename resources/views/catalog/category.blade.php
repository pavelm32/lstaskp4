@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Каталог Категория: {{$category->name}}</div>
                    <div class="card-body">
                        <p>Список всех товаров категории:</p>
                        <ul>
                            @foreach($products as $product)
                                <li><img width="150" src="{{$product->picture}}"><a href="{{route('catalog.product', $product->id)}}">{{$product->name}} ({{$product->price}})</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
