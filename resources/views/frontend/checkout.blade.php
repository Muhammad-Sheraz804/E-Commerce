@extends('layouts.front')

@section('title')
    Checkout
@endsection
<style>
.checkout-form label{
    font-size: 12px;
    font-weight: 700;
}
.checkout-form input{
    font-size: 14px;
    padding: 5px;
    font-weight: 400;
}
</style>

@section('content')

    <div class="container mt-5 ">
        <form method="POST" action="{{route('place_order')}}">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <input type="text" name="fname" value="{{Auth::user()->name}}" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" value="{{Auth::user()->lname}}" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone</label>
                                <input type="phone" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Enter Phone">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" value="{{Auth::user()->address1}}" class="form-control" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" value="{{Auth::user()->address2}}" class="form-control" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" name="state" value="{{Auth::user()->state}}" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" name="country" value="{{Auth::user()->country}}" class="form-control" placeholder="Enter Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="number" name="pincode" value="{{Auth::user()->pincode}}" class="form-control" placeholder="Enter Pin Code">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($cart_item as $cart)
                        <tr>
                            <td>{{$cart->products->name}}</td>
                            <td>{{$cart->prod_qty}}</td>
                            <td>{{$cart->products->selling_price}}</td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <hr>
                        <button class="btn btn-primary col-md-12">Place Order</button>
                    </div>
                </div>    
            </div>
        </div>
    </form>
    </div>

@endsection