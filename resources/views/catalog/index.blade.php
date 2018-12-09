@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Каталог</div>
                    <div class="card-body">
                        <p>Список категорий:</p>
                        <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('catalog.category', $category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                        </ul>
                        <p>Список всех товаров:</p>
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
