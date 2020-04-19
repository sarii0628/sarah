<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Stock;

class ProductsController extends Controller
{
    //
    public function index(Request $request) {
        $categories = Category::all();
        return view('products.index', ['categories' => $categories]);
    }

    public function show_category(Request $request, $id) {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();

        return view('products.cat_details.index', ['category' => $category, 'products' => $products]);
    }

    public function show_product(Request $request, $category_id, $product_id) {
        $category = Category::find($category_id);
        $product = Product::find($product_id);
        $stocks = $product->stocks()->get();
        foreach($stocks as $stock){
            $images[$stock->id] = $stock->img_name; 
        }
        return view('products.product_details.index', ['category' => $category, 'product' => $product, 'images' => $images]);
    }
}
