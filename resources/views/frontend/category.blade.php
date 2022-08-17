@extends('layouts.front')

@section('title')
    Category
@stop

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="row">
                @foreach($categories as $category)
                <div class="col-md-4 mb-3">
                    <a href="{{route('view_category', $category->slug)}}">
                    <div class="card">
                        <img src="{{asset('images/photo-1567581935884-3349723552ca.jpg')}}">
                        <div class="cadr-body">
                            <h5>{{$category->name}}</h5>
                            <p>
                                {{$category->description}}
                            </p>

                        </div>
                    </div>
                    </a>
                </div>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@stop