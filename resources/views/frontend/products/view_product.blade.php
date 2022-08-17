@extends('layouts.front')

@section('title')
    {{$product->name}}
@stop

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{$product->categories->name}} / {{$product->name}}</h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img class="w-100" src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                            @if($product->trending == '1')
                            <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price: <s>Rs {{$product->original_price}}</s></label>
                        <label class="fw-bold">Selling Price: Rs {{$product->selling_price}}</label>
                        <p class="mt-3">
                            {!! $product->description !!}
                        </p>
                        <hr>
                        @if($product->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label>Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                @if($product->qty > 0)
                                <button style="display: flex;align-items: center;" type="button" class="btn btn-success me-3 float-start">Add to Wishlist <ion-icon name="heart"></ion-icon></button>
                                @endif
                                
                                <button style="display: flex;align-items: center;" type="button" class="btn btn-primary addToCart me-3 float-start">Add to Cart <ion-icon name="cart-outline"></ion-icon></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

@stop
