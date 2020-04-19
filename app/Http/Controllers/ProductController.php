<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Product::all();
        return view('product.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        $categories = Category::all();
        return view('product.add', ['categories' => $categories]);
    }

    public function create(ProductRequest $request)
    {
        $product = new Product;
        $form = $request->all();
        unset($form['_token']);
        $product->fill($form)->save();
        return redirect('/product');
    }

    public function edit(Request $request)
    {
        $categories = Category::all();
        $product = Product::find($request->id);
        return view('product.edit', ['categories' => $categories, 'form' => $product]);
    }

    public function update(ProductEditRequest $request)
    {
        $product = Product::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $product->fill($form)->save();
        return redirect('/product');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        return view('product.del', ['form' => $product]);
    }

    public function remove(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/product');
    }
}
