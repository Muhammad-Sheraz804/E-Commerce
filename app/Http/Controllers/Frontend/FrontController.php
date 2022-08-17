<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class FrontController extends Controller
{
    public function index(){
        $trending_products = Product::where('trending', 1)->get();
        $trending_category = Categories::where('popular', 1)->get();
        return view('Frontend.index', compact('trending_products', 'trending_category'));
    }
    public function category(){
        $categories = Categories::where('status', 0)->get();
        return view('frontend.category', compact('categories'));
    }

    public function view_category($slug){

        $category = Categories::where('slug', $slug)->first();

        $products = Product::where([
            ['cate_id', '=', $category->id],
            ['status', '=', 0]
        ])->get();
        return view('frontend.products.index',[
            'products' => $products,
            'category' => $category
        ]);

    }

    public function view_product($cate_slug, $prod_slug){
        if(Categories::where('slug', $cate_slug)->exists()){
            if(Product::where('slug', $prod_slug)->exists()){
                $product = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view_product', compact('product'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'No such category found');
        }
    }
}
