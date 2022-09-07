@extends('layouts.app')
@section('content')

<div class="container index">
    <div class="row content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Все записи</h2>
            </div>
            
        </div>
    </div>
    @if ($message = Session::get('success')) 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered"> 
        <tr>
            <th>Название</th>
            <th>Описание</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
        </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
</div>

@endsection