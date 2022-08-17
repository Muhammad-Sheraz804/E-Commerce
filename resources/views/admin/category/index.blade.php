@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($categories as $category)
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <img src="<?php public_path(); ?>/assets/uploads/category/{{$category->image}}" width="200px" height="100px">
                        </td>
                        <td>
                            <form method="post" action="{{route('edit_category',$category->id)}}">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            <form method="post" action="{{route('delete_category',$category->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop