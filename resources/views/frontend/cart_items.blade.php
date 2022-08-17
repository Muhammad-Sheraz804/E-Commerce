@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{route('index')}}">
                    Home /
                </a>
                <a href="{{route('cart')}}">
                    Cart
                </a>
            </h6>
        </div>
    </div>
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @php
            $total = 0;
            @endphp
            @foreach($cart_item as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}" height="70px" width="70px" alt="Image Here">
                </div>
                <div class="col-md-3 my-auto">
                    <h3>{{$item->products->name}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h6> RS. {{$item->products->selling_price}}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}"> 
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                    
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete_cart_item"><ion-icon name="trash"></ion-icon>Remove</button>
                </div>
            </div>
            
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price {{$total}}
            <a href="{{route('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </h6>
        </div>
    </div>
</div>

@stop