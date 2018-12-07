@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание товара</div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            Имя: <input type="text" name="name"><br/>
                            @if(!empty($category_list))
                                Категория: <select name="category_id">
                                    @foreach($category_list as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select><br/>
                            @endif
                            Цена: <input type="text" name="price"><br/>
                            Картинка: <input type="file" name="picture"><br/>
                            Описание: <textarea name="description" cols="30" rows="3">

                            </textarea><br/>
                            <input type="submit" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
