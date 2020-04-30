<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest; 
use App\Http\Requests\CategoryEditRequest;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Category::query();

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
        
        return view('category.index', ['items' => $data, 'keyword' => $keyword, 'sort' => $sort]);
    }

    public function add(Request $request)
    {
        return view('category.add');
    }

    public function create(CategoryRequest $request)
    {
        $category = new Category;
        $form = $request->all();
        $path = $request->file('photo')->store('public/cat_img');
        $form['img_name'] = basename($path);
        unset($form['photo']);
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/category');
    }

    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        return view('category.edit', ['form' => $category]);
    }

    public function update(CategoryEditRequest $request)
    {
        $category = Category::find($request->id);
        $form = $request->all();

        if (isset($form['photo'])) {
            $path = $request->file('photo')->store('public/cat_img');
            $form['img_name'] = basename($path);
        } else {
            $form['img_name'] = $category->img_name;
        }
        unset($form['photo']);
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
        $category = Category::find($request->id);
        Storage::delete('public/cat_img'.$category->img_name);
        $category->delete();
        return redirect('/category');
    }
}
