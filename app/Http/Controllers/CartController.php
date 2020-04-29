<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;

use Cart;

use Auth;

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

        $total = Cart::getSubTotal();


        return view('cart.index', ["items" => $items, 'total' => $total]);
    }

    public function index(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        $items = Cart::getContent();
        $total = Cart::getSubTotal();

        $isEmpty = Cart::isEmpty();

        return view('cart.index', ['items' => $items, 'total' => $total, 'isEmpty' => $isEmpty]);
    }

    public function plus(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        Cart::update($request->id, array(
            'quantity' => 1,
        ));


        return redirect('/cart/index');
    }

    public function minus(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        Cart::update($request->id, array(
            'quantity' => -1,
        ));

        return redirect('/cart/index');
    }

    public function remove(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->remove($request->id);

        return redirect('/cart/index');
    }

    public function confirm(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->remove($request->id);

        $items = Cart::getContent();
        $total = Cart::getSubTotal();

        if(Cart::isEmpty()){
            return redirect('/cart/index');
        }

        $username = Auth::user()->name;
        $address = Auth::user()->email;

        app()->call(ConfirmMailController::class . '@confirmMail', ['name' => $username, 'total' =>  $total, 'to' => $address ]);

        $request->session()->regenerateToken();

        Cart::clear();

        return view('cart.confirm', ['items' => $items, 'total' => $total]);
    }
}
