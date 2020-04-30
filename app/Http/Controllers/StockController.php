<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Color;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StockEditRequest;
use App\Http\Requests\StockRequest;

use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Stock::query();

        $keyword = $request->input('keyword');
        if($keyword)
        {
            $query->whereHas('product', function($query) use ($keyword){
                $query->where('name', 'like', '%'.$keyword.'%');
            }); 
        }

        $sort = $request->sort;
        if(!empty($sort))
        {
            $data = $query->orderBy($sort, 'asc')->paginate(5);
        } else 
        {
            $data = $query->orderBy('product_id', 'asc')->paginate(5);
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
        $stock = Stock::create([
            'product_id' => $request->product_id, 
            'quantity' => $request->quantity,
            'color_id' => $request->color_id,
            ]);

        foreach($request->file('files') as $index => $e) {
            $ext = $e['photo']->guessExtension();
            $filename = "p{$request->product_id}_c{$request->color_id}_{$index}_.{$ext}";
            //名前かぶって面倒なことになりそうだからランダムに変更
            $path = $e['photo']->store('public/img');
            $base = basename($path); 
            $stock->images()->create(['path' =>  $base]);
        }
    
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
        if (isset($request->update)) {
            $stock = Stock::find($request->id);
            $stock->update([
                            'product_id' => $request->product_id, 
                            'quantity' => $request->quantity,
                            'color_id' => $request->color_id,
                            ]);

            if ($request->file('files')) {
                foreach($request->file('files') as $index => $e) {
                    $ext = $e['photo']->guessExtension();
                    $filename = "p{$request->product_id}_c{$request->color_id}_{$index}.{$ext}";
                    $path = $e['photo']->store('public/img');
                    $base = basename($path); 
                    $stock->images()->create(['path' =>  $base]);
                }
            }

        } elseif (isset($request->del_photo)) {
            $image = Image::find($request->image_id);
            Storage::delete('public/img/'.$image->path);
            $image->delete();
        }

        return redirect('/stock');
    }

    public function delete(Request $request)
    {
        $stock = Stock::find($request->id);
        return view('stock.del', ['form' => $stock]);
    }

    public function remove(Request $request)
    {
        $stock = Stock::find($request->id);
        
        foreach($stock->images as $image){
            Storage::delete('public/img/'.$image->path);
            $image->delete();
        }
        $stock->delete();
        return redirect('/stock');
    }
}
