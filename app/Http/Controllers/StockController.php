<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Color;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Stock::all();
        return view('stock.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        $products = Product::all();
        $colors = Color::all();
        return view('stock.add', ['products' => $products, 'colors' => $colors]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Stock::$rules);
        $stock = new Stock;
        $form = $request->all();
        //$request->file('photo')->storeAs('public/stock_images', $stock->id . '.png');
        $path = $request->file('photo')->store('public/img');
        $form['img_name'] = basename($path);
        unset($form['photo']);
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/stock')->with('success', '新しい在庫を追加しました');
    }

    //リクエストで受け取ったファイルを一時的に格納
    // public function confirm(Request $request)
    // {
    //     $this->validate($request, Stock::$rules);
    //     $product_id = $request->product_id;
    //     $color_id = $request->color_id;
    //     $quantity = $request->quantity;
    //     $img_name = uniqid("STOCK_") . "." . $request->file('photo')->guessExtension();
    //     $img = "/img/tmp/".$img_name;

    //     $hash = array(
    //         'product_id' => $product_id,
    //         'color_id' => $color_id,
    //         'quantity' => $quantity,
    //         'img' => $img,
    //     );

    //     return view('stock.confirm')->with($hash);
    // }

    // public function finish(Request $request)
    // {
    //     $stock = new Stock;
    //     $stock->product_id = $request->product_id;
    //     $stock->color_id = $request->color_id;
    //     $stock->quantity = $request->quantity;
    //     $stock->save();

    //     $lastInsertedId = $stock->id;

    //     if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
    //         mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
    //     }

    //     rename(public_path() . $request->img , public_path() . "/img/stock_" . $lastInsertedId . "/stock." . pathinfo($request->img, PATHINFO_EXTENSION));
    //     return redirect('/stock')->with('success', '新しい在庫を追加しました');
    // }

    public function edit(Request $request)
    {
        $products = Product::all();
        $colors = Color::all();
        $stock = Stock::find($request->id);
        return view('stock.edit', ['products' => $products, 'colors' => $colors, 'form' => $stock]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Stock::$rules);
        $stock = Stock::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/stock');
    }

    public function delete(Request $request)
    {
        $stock = Stock::find($request->id);
        return view('stock.del', ['form' => $stock]);
    }

    public function remove(Request $request)
    {
        Stock::find($request->id)->delete();
        return redirect('/stock');
    }
}
