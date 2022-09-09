@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('posts.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название <span>:</span></strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Описание <span>:</span></strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Цена <span>:</span></strong>
                    <input type="number" name="price" value="{{ $post->price }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
              <button type="submit" class="btn btn-warning">Отправить</button>
            </div>
        </div>
    </form>
</div>
@endsection