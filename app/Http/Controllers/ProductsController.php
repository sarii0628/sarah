<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //
    public function index() {
        $items = DB::select('select * from products');
        return view('products.index', ['items' => $items]);
    }
}
