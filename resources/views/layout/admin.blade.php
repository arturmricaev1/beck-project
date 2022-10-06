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
               
            </div>
        </div>
    </div>
@endforeach
@endsection