@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
        </div>
        <div class="card-body">
                <form method="post" action="{{route('update_product', $product->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <select class="form-select" aria-label="Default Select Example">
                            <option value="">{{$product->categories->name}}</option>
                            
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                        <textarea name="small_description" rows="2" class="form-control">{{$product->small_description}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="text" class="form-control"  value="{{$product->original_price}}" name="original_price" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="text" class="form-control" value="{{$product->selling_price}}" name="selling_price" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" value="{{$product->qty}}" name="qty" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control" value="{{$product->tax}}" name="tax" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$product->status == '1' ? 'checked' : ''}} name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" value="{{$product->meta_keywords}}" name="meta_keywords" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12">
                        @if($product->image)
                        <img src="{{asset('assets/uploads/product/'. $product->image)}}" width="200px">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div><br><br>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop