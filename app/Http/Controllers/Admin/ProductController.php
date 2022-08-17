<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use File;

class ProductController extends Controller
{
    public function products(){
        
        return view('admin.product.index',[
            'products' => Product::all()
        ]);
    }
    public function add_product(){

        return view('admin.product.add',[
            'categories' => Categories::all()
        ]);
    }
    public function insert_product(Request $req){
        $product = new Product;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->cate_id = $req->cate_id;
        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->description = $req->input('description');
        $product->small_description = $req->input('small_description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->qty = $req->input('qty');
        $product->tax = $req->input('tax');
        $product->status = $req->input('status') == TRUE ? '1' : '0';
        $product->trending = $req->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_descrip');
        $product->save();

        return redirect('/products')->with('status', 'Product Added Successfully');

    }

    public function edit_product(Product $product){
        return view('admin.product.edit', [
            'product' => $product
        ]);

    }

    public function update_product(Request $req,Product $product){
        $product = Product::find($product->id);
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->description = $req->input('description');
        $product->small_description = $req->input('small_description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->qty = $req->input('qty');
        $product->tax = $req->input('tax');
        $product->status = $req->input('status') == TRUE ? '1' : '0';
        $product->trending = $req->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_descrip');
        $product->update();

        return redirect('/products')->with('status', 'Product Added Successfully');
    }
    public function delete_product(Product $product){
        if($product->image){
            $path = 'assets/uploads/product' . $product->image;
            if(File::exists($path)){
                File::delete();
            }
        }
        $product->delete();
        return redirect('/products')->with('status', 'Categories Deleted Successfully');
    }
}
