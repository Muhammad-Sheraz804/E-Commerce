@extends('layouts.front')

@section('title')
    {{$category->name}}
@stop

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{$category->name}}</h6>
        </div>
    </div>

<div class="py-5">
    <div class="container">
        <div class="row">
                <h2>{{$category->name}}</h2>
                @foreach($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('view_product/'. $category->slug . '/' .$product->slug)}}">
                        <img class="w-100" src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}">
                        <div class="card-body">
                            <h5>{{$product->name}}</h5>
                            <span class="float-start">{{$product->selling_price}}</span>
                            <span class="float-end"><s>{{$product->original_price}}</s></span>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>


@stop