@extends('layouts.app')
@section('content')

<div class="container index">
    <div class="row content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Все записи</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success buttom" href="{{ route('posts.create') }}"> Добавить пост</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success')) 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered "> 
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->price }}р</td>

            <td class='crud'>
                 <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Просмотр</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Редактировать</a>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection