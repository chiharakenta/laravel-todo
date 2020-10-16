<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('categories/index', [
            'categories' => $user->categories
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->input('name');
        Category::create(
            ['name' => $name, 'user_id' => Auth::id()]
        );
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
