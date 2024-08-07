<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $prodid = $request->input('pid');
        $product = Product::findOrFail($prodid);
        $quantity = $request->input('number2');

        $cart = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $prodid,
            'quantity' => $quantity,
            'price_per_unit' => $product->price,
        ]);

        return redirect()->back()->with('message', 'تمت إضافة المنتج إلى السلة بنجاح!');
    }
    public function buy(Request $request)
    {
        $ord = new Order();
        $user_id = $ord->user_id = $request->input('user_id');
        $ord->status = "waiting";
        $ord->address = $request->input('address');
        $ord->city = $request->input('city');
        $ord->phone = $request->input('phone');
        $ord->name = $request->input('name');
        $ord->email = $request->input('email');
        $q  = DB::table('carts')->where('user_id', '=', $user_id)->value('quantity');
        $price = DB::table('carts')->where('user_id', '=', $user_id)->value('price_per_unit');
        $total_price = $q * $price;
        $ord->total_price = $total_price;
        $ord->save();
        $ordt = new OrderDetail();
        $pid  = DB::table('carts')->where('user_id', '=', $user_id)->value('product_id');
        $oid  = DB::table('orders')->where('user_id', '=', $user_id)->value('id');
        $ordt->order_id = $oid;
        $ordt->product_id = $pid;
        $ordt->quantity = $q;
        $ordt->price = $price;
        $ordt->discount = 0;
        $ordt->save();
        return view('confirm_order', ['order_id' => $oid]);
    }

    public function showCart()
    {
        $items = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('items'));
    }
}


