@extends('layouts.app') 
@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>code</th>
            <th>Name</th>
           
            <th width="280px">price</th>
            <th width="280px">Foto</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($tags as $tag)
	    <tr>           
	        <td>{{ $tag->code }}</td>
	        <td>{{ $tag->name }}</td>
	        <td>{{ $tag->price }}</td>
            <td><img src="{{ url('/image/news/thumbnail/'.$tag->image) }}" alt=""></td>
            <td>
                <form action="{{ route('favorites', ['id' => $tag->id]) }}"
                    method="GET" class="form-inline">
                  @csrf
                <button type="submit" style="padding: 0; border: none;
                background-color: yellow;">
                <img src="/image/news/favorites/favorites.png" alt="#" style="max-width: 25px"></label>
                </form>
            </td>
	        
      
	          
	    </tr>
	    @endforeach
    </table>

</div>
@endsection