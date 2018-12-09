@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Каталог Страница товара: {{$product->name}}</div>
                    <div class="card-body">
                        @if(isset($status))
                            @if ($status == 'success')
                                <p style="color:green">Заказ {{$order}} успешно создан</p>
                            @else
                                <p style="color:red">Заказ не удалось создать</p>
                            @endif
                        @endif

                        <img width="150" src="{{$product->picture}}"><br>
                        Название:{{$product->name}}<br>
                        Цена: {{$product->price}}<br>
                        Описание: {{$product->description}}

                        @if (Auth::check())
                            <a href="{{route('catalog.checkout', $product->id)}}" data-toggle="modal" data-target="#exampleModalCenter"
                               onclick="event.preventDefault();">Закзать товар</a>


                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Форма заказа товара {{$product->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="order-form" action="{{ route('catalog.checkout',$product->id) }}" method="POST">
                                                @csrf

                                                Имя <input type="text" name="name" value="{{Auth::user()->name}}"><br>
                                                Емейл <input type="text" name="email" value="{{Auth::user()->email}}"><br>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            <button type="button" class="btn btn-primary"
                                                    onclick="event.preventDefault();
                                                    getElementById('order-form').submit();">Заказать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{route('login')}}">Авторизуйтесь</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
