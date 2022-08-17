@extends('layouts.front')

@section('title')
    E-Shop
@stop

@section('content')
@include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2><strong>Featured Products</strong></h2>
                @foreach($trending_products as $product)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}">
                        <div class="cadr-body">
                            <h5>{{$product->name}}</h5>
                            <span class="float-start">{{$product->selling_price}}</span>
                            <span class="float-end"><s>{{$product->original_price}}</s></span>

                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2><strong>Trending Category</strong></h2>
                @foreach($trending_category as $tcategory)
                <div class="col-md-3 mt-3">
                    <a href="{{route('view_category', $tcategory->slug)}}">
                    <div class="card">
                        <img src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}">
                        <div class="cadr-body">
                            <h5>{{$tcategory->name}}</h5>
                            <p>
                                {{$tcategory->description}}
                            </p>

                        </div>
                    </div>
</a>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
@stop