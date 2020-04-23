<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\StockEditRequest;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Stock::query();

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
        
        return view('stock.index', ['items' => $data, 'keyword' => $keyword, 'sort' => $sort]);
    }

    public function add(Request $request)
    {
        $products = Product::all();
        $colors = Color::all();
        return view('stock.add', ['products' => $products, 'colors' => $colors]);
    }

    public function create(StockRequest $request)
    {
        $stock = new Stock;
        $form = $request->all();
        $path = $request->file('photo')->store('public/img');
        $form['img_name'] = basename($path);
        unset($form['photo']);
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/stock');
    }

    public function edit(Request $request)
    {
        $products = Product::all();
        $colors = Color::all();
        $stock = Stock::find($request->id);
        return view('stock.edit', ['products' => $products, 'colors' => $colors, 'form' => $stock]);
    }

    public function update(StockEditRequest $request)
    {       
        $stock = Stock::find($request->id);
        $form = $request->all();

        if (isset($form['photo'])) {
            $path = $request->file('photo')->store('public/img');
            $form['img_name'] = basename($path);
        } else {
            $form['img_name'] = $stock->img_name;
        }
        unset($form['photo']);
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
