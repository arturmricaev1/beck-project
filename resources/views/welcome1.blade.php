@extends('layouts.app')
@section('content')

<div class="container index">
    @foreach ($users as $user)
        <h1>Добро пожаловать  <span class='user-name'>{{ $user->name }} </span></h1>
    @endforeach
</div>
@endsection