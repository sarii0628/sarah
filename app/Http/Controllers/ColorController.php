<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Color::all();
        return view('color.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('color.add');
    }
    
    public function create(ColorRequest $request)
    {
        $color = new Color;
        $form = $request->all();
        unset($form['_token']);
        $color->fill($form)->save();
        return redirect('/color');
    }

    public function edit(Request $request)
    {
        $color = Color::find($request->id);
        return view('color.edit', ['form' => $color]);
    }

    public function update(ColorRequest $request)
    {
        $color = Color::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $color->fill($form)->save();
        return redirect('/color');
    }

    public function delete(Request $request)
    {
        $color = Color::find($request->id);
        return view('color.del', ['form' => $color]);
    }

    public function remove(Request $request)
    {
        Color::find($request->id)->delete();
        return redirect('/color');
    }
}
