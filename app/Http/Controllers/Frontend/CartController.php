<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;


class CartController extends Controller
{
    public function add_to_cart(Request $req){
        $prod_id = $req->product_id;
        $prod_qty = $req->product_qty;

        if(Auth::check()){
            $prod_check = Product::where('id', $prod_id)->first();
            if($prod_check)
            {
                $cart_check = Cart::where([
                    ['prod_id', '=', $prod_id],
                    ['user_id', '=', Auth::id()]
                ])->exists();
                if($cart_check)
                {
                    return response()->json(['status' => $prod_check->name . ' Already Added To Cart']);
                }
                else 
                {
                 $cart = new Cart;
                 $cart->prod_id = $prod_id;
                 $cart->user_id = Auth::id();
                 $cart->prod_qty = $prod_qty;
                 $cart->save();

                 return response()->json(['status' => $prod_check->name . ' Added To Cart']);
                }
            }

        }
        else 
        {
            return response()->json(['status' => 'Login To Continue']);
        }

    }

    public function view_cart(){
        $cart_item = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart_items', compact('cart_item'));
    }

    public function update_cart(Request $request)
    {
        $prod_id = $request->prod_id;
        $prod_qty = $request->prod_qty;

        if(Auth::check())
        {
            if(Cart::where([
                ['user_id', '=', Auth::id()],
                ['prod_id', '=', $prod_id]
            ])->exists())
            {
                $cart = Cart::where([
                ['user_id', '=', Auth::id()],
                ['prod_id', '=', $prod_id]
                ])->first();
                $cart->prod_qty = $prod_qty;
                $cart->update();
                return response()->json(['status' => 'Quantity Updated']); 
            }   
        }
        else
        {
            return response()->json(['status' => 'Login To Continue']);
        }
    }

    public function delete_cart_item(Request $request){
        $prod_id = $request->prod_id;
        if(Auth::check())
        {
            if(Cart::where([
                ['user_id', '=', Auth::id()],
                ['prod_id', '=', $prod_id]
            ])->exists())
            {
                $cart_item = Cart::where([
                ['user_id', '=', Auth::id()],
                ['prod_id', '=', $prod_id]
            ])->first();
                $cart_item->delete();

                return response()->json(['status' => 'Product Deleted Successfully']);
            }
        }
        else
        {
            return response()->json(['status' => 'Login To Continue']);
        }
    }
}
