@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @can('product-create')
                <a style="margin: 20px 0" class="btn btn-outline-dark"
                     href="{{ route('products.create') }}"> Create New Product
                </a>
                @endcan
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
            <th>Details</th>
            <th width="280px">Foto</th>
            <th width="280px">price</th>
            <th>User_id</th>
            <th>Action</th>
   
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td><img src="{{ url('/image/news/thumbnail/'.$product->image) }}" alt=""></td>
	        <td>{{ $product->price }}р</td>
	        <td>{{ $product->user_id }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-outline-success" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-outline-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                    @endcan
                </form>
                
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $products->links() !!}
</div>
@endsection