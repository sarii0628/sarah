<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Category::all();
        return view('category.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('category.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Category::$rules);
        $category = new Category;
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/category');
    }

    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        return view('category.edit', ['form' => $category]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Category::$rules);
        $category = Category::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/category');
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        return view('category.del', ['form' => $category]);
    }

    public function remove(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/category');
    }
}
