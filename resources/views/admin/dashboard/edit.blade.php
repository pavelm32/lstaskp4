@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Установить емейл для уведомлений</div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.update')}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            Емейл для уведомлений: <input type="text" name="email" value="{{$user->notify_email}}">
                            <input type="submit" value="Установить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
