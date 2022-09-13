@extends('layouts.app')
@section('content')
<div class="container index">
    <div class="row content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Все Пользователи</h2>
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
            <th>Имя</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Операции</th>
        </tr>
        @foreach ($users as $user)
        <tr>
    
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roleName }}</td>
            <td class='crud'>
                <a class="btn btn-danger" href="{{ route('permissions')}}">Назначить роль</a>
                <a class="btn btn-warning" href="#">Дать Права</a>
           </td>
        </tr>
        @endforeach
    </table>
    
</div>

@endsection