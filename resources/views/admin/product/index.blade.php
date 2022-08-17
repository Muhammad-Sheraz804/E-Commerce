@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Products</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Seeling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($products as $product)
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->categories->name}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>
                            <img src="<?php public_path(); ?>/assets/uploads/product/{{$product->image}}" width="200px" height="100px">
                        </td>
                        <td>
                            <form method="post" action="{{route('edit_product',$product->id)}}">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            <form method="post" action="{{route('delete_product',$product->id)}}">
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