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
            <th>Назначить</th>

        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>            
            <td>{{ $user->email }}</td>
            <td>{{ $user->roleName }}</td>
            <td class='crud'>
                <form action="{{ route('change-role', [ 'user'=> $user->id, 'roleId' => $roles->where('name', 'admin')->first()->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">Admin</button>
                </form>
                <form action="{{ route('change-role', [ 'user'=> $user->id, 'roleId' => $roles->where('name', 'user')->first()->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">User</button>
                </form>         
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection