<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;

use Cart;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $stock = Stock::find($request->stock_id);

        $userId = auth()->user()->id;
        Cart::session($userId);

        Cart::add([
            'id' => $stock->id,
            'name' => $stock->product->name,
            'price' => $stock->product->price,
            'quantity' => $request->qty,
            'attributes' => array(),
            'associatedModel' => $stock,
            
        ]);

        $items = Cart::getContent();

        $category_id = $request->category_id;
        $product_id = $request->product_id;

        return view('cart.index', ["items" => $items, "category_id" => $category_id, "product_id" => $product_id]);
    }

    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        $cartCollection = Cart::getContent();
        $total = Cart::getSubTotal();

        return view('cart.index', ['cartItems' => $cartCollection, 'total' => $total]);
    }
}
