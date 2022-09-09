@extends('layouts.app')
@section('content')

<div class="container index">

        <h1>Добро пожаловать  <span class='user-name'>{{ Auth::user()->name }} </span></h1>

</div>
@endsection