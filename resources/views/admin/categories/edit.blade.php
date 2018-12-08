@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменение категории</div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.update', [$product->id])}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            Имя: <input type="text" name="name" value="{{$product->name}}"><br/>
                            Описание:
                            <textarea name="description" cols="30" rows="3">{{$product->description}}</textarea><br/>
                            <input type="submit" value="Изменить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
