@extends('layouts.app')

@section('content')
<div class="container products-create">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-outline-success"
                 href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <span class="text-success font-weight-bold">
                    {{ $product->name }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                <span class="text-success font-weight-bold">
                     {{ $product->detail }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <span class="text-success font-weight-bold">
                     {{ $product->price }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <span class="text-success font-weight-bold">
                    <td><img src="{{ url('/image/news/thumbnail/'.$product->image) }}" alt=""></td>

                </span>
            </div>
        </div>
    </div>
</div>
@endsection