<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {

        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories/edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $category = Category::find($id);
        $category->name = $name;
        $category->save();
        return redirect('/categories');
    }

    public function destroy(Request $request, $id)
    {
        Category::destroy($id);
        return redirect('/categories');
    }
}
