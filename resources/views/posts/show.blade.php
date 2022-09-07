@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="row content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Просмотр записи</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Название</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {{ $post->title }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                {{ $post->description }}
            </div>
        </div>
    </div>
</div>
@endsection