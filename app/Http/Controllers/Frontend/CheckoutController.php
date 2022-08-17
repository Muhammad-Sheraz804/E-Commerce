<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;
use Str;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cart_item = Cart::where('user_id', Auth::id())->get();
        foreach($old_cart_item as $item)
        {
            if(!Product::where([
                ['id', '=', $item->prod_id],
                ['qty', '>=', $item->prod_qty]
            ])->exists())
            {
                $remove_item = Cart::where([
                    ['user_id', '=', Auth::id()],
                    ['prod_id', '=', $item->prod_id]
                ])->first();
                $remove_item->delete();
            }
        }
        $cart_item = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cart_item'));
    }

    public function place_order(Request $request)
    {
        $input = $request->all();
        $input['tracking_no'] = 'sheraz' . Str::random(100);

        $order = Order::create($input);

       $cart_items = Cart::where('user_id', Auth::id())->get();
       foreach($cart_items as $item)
       {
        Order_item::create([
            'order_id' => $order->id,
            'prod_id' => $item->prod_id,
            'qty' => $item->prod_qty,
            'price' => $item->products->selling_price,
        ]);

        $product = Product::where('id', $item->prod_id)->first();
        $product->qty = $product->qty - $item->prod_qty;
        $product->update();
       }

       if(Auth::user()->address1 == null)
       {
        $user = User::where('id', Auth::id())->first();
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->pincode = $request->pincode;
        $user->update();
       }
       $cart = Cart::where('user_id', Auth::id())->delete();
       return redirect('/')->with('status', 'Order Placed Successfully');
    }
}
