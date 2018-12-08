@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>
                    <div class="card-body">
                        <a href="{{route('categories.create')}}" class="btn">Создать категорию</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ид</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($categories))
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description ?? "-"}}</td>
                                        <td><a href="{{route('categories.edit', [$category->id])}}">Изменить Категорию</a><br><a href="{{route('categories.delete', [$category->id])}}">Удалить Категорию</a></td>
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
