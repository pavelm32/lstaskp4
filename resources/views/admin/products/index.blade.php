@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Товары</div>
                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn">Создать товар</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ид</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Цуна</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($products))
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description ?? "-"}}</td>
                                        <td>
                                            @if($product->picture)
                                                <img width="150" src="{{$product->picture}}"/>
                                            @endif
                                        </td>
                                        <td><a href="{{route('products.edit', [$product->id])}}">Изменить Товар</a><br><a href="{{route('products.delete', [$product->id])}}">Удалить Товар</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
