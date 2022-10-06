@extends('layouts.app') 
@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>code</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">price</th>
            <th width="280px">Foto</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($products as $product)
	    <tr>           
	        <td><a href='{{ route('detailed', ['code' => $product->code])}}'>{{ $product->code }}</a></td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        
            @if ($product->discount != 0)
                <td class="disount-span">
                    <span class="disount-old">
                        {{ $product->price }}р
                    </span>
                    <span class="disount-new">
                        {{ ($product->price-($product->price/100)*$product->discount)}}р
                    </span>
                </td>
            @elseif (($product->discount == 0)) 
                <td>
                    {{ $product->price }}
                </td>
            @endif     
	        <td>
                <div class="image-discount">
                    <img class="image-all" src="{{ url('/image/news/thumbnail/'.$product->image) }}" alt="">
                    @if ($product->discount != 0)
                        <p class="discount">{{ $product->discount }}%</p>
                    @endif
                </div>
            </td> 
	        <td>
                <div class="col-md-10">
             
                    <form action="{{ route('favorites', ['id' => $product->id]) }}"
                        method="GET" class="form-inline">
                      @csrf
                      {{-- <p>{{ $product->is_favorite ? 'qwe' : 'asd' }}</p> --}}
                      @if ($product->is_favorite == true)
                        <button type="submit" style="padding: 0; border: none;
                        background-color: yellow;">
                        <img src="/image/news/favorites/favorites.png" alt="#" style="max-width: 25px"></label>
                        </button>
                    @elseif($product->is_favorite == false)
                         <button type="submit" style="padding: 0; border: none;
                         background-color: transparent;">
                         <img src="/image/news/favorites/favorites.png" alt="#" style="max-width: 25px"></label>
                         </button>   
                    @endif     
                     
                  </form>
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