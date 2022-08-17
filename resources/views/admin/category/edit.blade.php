@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
                <form method="post" action="{{route('update_category',$category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}}  name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" {{$category->popular == '1' ? 'checked' : ''}} name="popular" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" value="{{$category->meta_keywords}}" class="form-control" name="meta_keywords" >
                    </div>
                    <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12">
                        @if($category->image)
                        <img src="{{asset('assets/uploads/category/'. $category->image)}}" width="200px">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop