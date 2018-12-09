@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Админка</div>
                    <div class="card-body">
                       Меню
                        <ul>
                            <li><a href="{{route('products.index')}}">Товары</a></li>
                            <li><a href="{{route('categories.index')}}">Категории</a></li>
                            <li><a href="{{route('orders.index')}}">Заказы</a></li>
                            <li>
                                @if($user->notify_email != '')
                                    <a href="{{route('admin.edit')}}">Изменить емейл для уведомлений ({{$user->notify_email}})</a>
                                @else
                                    <a href="{{route('admin.edit')}}">Установить емейл для уведомлений (не установлен)</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
