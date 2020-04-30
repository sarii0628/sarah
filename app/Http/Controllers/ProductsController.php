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
        $query = Product::where('category_id', $id);

        $keyword = $request->input('keyword');
        if(!empty($keyword))
        {
            $query->where('name', 'like', '%'.$keyword.'%');
        }

        $sort = $request->sort;
        if(!empty($sort))
        {
            $data = $query->orderBy($sort, 'asc')->paginate(5);
        } else 
        {
            $data = $query->paginate(5);
        }
        
        return view('products.cat_details.index', ['category' => $category, 'items' => $data, 'keyword' => $keyword, 'sort' => $sort]);
    }

    public function show_product(Request $request, $category_id, $product_id) {
        $category = Category::find($category_id);
        $product = Product::find($product_id);
        $stocks = $product->stocks()->get();
        foreach($stocks as $stock){
            $images = $stock->images()->get();

            foreach($images as $image){
            $pics[$stock->id][$image->id] = $image->path; 
            }
        }
        foreach($stocks as $stock){
            $colors[$stock->id] = $stock->color;
        }
        return view('products.product_details.index', ['category' => $category, 'product' => $product, 'images' => $pics, 'colors' => $colors]);
    }
}
