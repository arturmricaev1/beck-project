@extends('layouts.app')
@section('content')

<div class="container">
<div class="row ">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>
                Управление пользователями
            </h2>
        </div>
        <div style="margin: 10px 0">
            <a class="btn btn-outline-secondary" href="{{ route('users.create') }}">
               Создать Пользователя
            </a>
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
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->roleName }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-outline-warning" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-outline-dark" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>

{!! $data->render() !!}
</div>
@endsection