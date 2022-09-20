@extends('layouts.app') 
@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">price</th>
            <th width="280px">Foto</th>
            <th width="280px">Actions</th>
   
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>{{ $product->price }}р</td>

	        <td><img src="{{ url('/image/news/thumbnail/'.$product->image) }}" alt=""></td>
	        <td>
                <div class="col-md-10">
                    <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
                    <!-- Форма для добавления товара в корзину -->
                    <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                          method="GET" class="form-inline">
                        @csrf
                        <label for="input-quantity">Количество</label>
                        <input  type="number" min="1" name="quantity" id="input-quantity" value="1"
                               class="form-control mx-2 w-50 mb-3">
                        <button type="submit" class="btn btn-success">Добавить в корзину</button>
                    </form>
                    
                </div>
                </div>
            </td>           
	   
	    </tr>
	    @endforeach
    </table>

    {!! $products->links() !!}
</div>
@endsection