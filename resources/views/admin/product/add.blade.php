@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
        </div>
        <div class="card-body">
                <form method="post" action="{{route('insert_product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <select name="cate_id" class="form-select" aria-label="Default Select Example">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                        <textarea name="small_description" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="text" class="form-control" name="original_price" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="text" class="form-control" name="selling_price" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" name="qty" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control" name="tax" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
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