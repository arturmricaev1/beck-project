@extends('layouts.app') 
@section('content')
@foreach ($items as $item)
    <div class="container">
        <div class="product">
            <div class="product-foto">
                <img class="product-foto-img" src="{{ url('/image/news/origin/'.$item->image) }}" alt="">
            </div>
            <div class="product-desc">
                <p>Название <span>{{ $item->name }}</span></p>
                <p>Описание <span>{{ $item->detail }}</span></p>
                <p>Цена <span>{{ $item->price }} р.</span></p>
                <form enctype="multipart/form-data" action="{{ route('discount.store', ['id' => $item->id]) }}" method="POST">
                    @csrf
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Discount:</strong>
                                <input type="number" name="discount" class="form-control"
                                placeholder="Discount" min="0" max="100">
                                <button type="submit" style="margin: 30px 0" class="btn btn-outline-dark">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection