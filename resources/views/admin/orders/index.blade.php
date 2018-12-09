@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Заказы</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ид</th>
                                    <th>Название товара</th>
                                    <th>Цена товара</th>
                                    <th>Емейл пользователя</th>
                                    <th>Имя пользователя</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($orders))
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->product->name}}</td>
                                        <td>{{$order->product->price}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->user_name}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
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
