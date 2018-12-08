@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание категории</div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            Имя: <input type="text" name="name"><br/>
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
