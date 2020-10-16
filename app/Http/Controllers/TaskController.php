<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Category;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('tasks/index', [
           'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $content = $request->input('content');
        $category_id = $request->input('category_id');

        $task = new Task();
        $task->content = $content;
        $task->category_id = $category_id;

        if ($task->save() )
        {
            return redirect('/tasks');
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id)
    {
        $content = $request->input('content');
        $task = Task::find($id);
        $task->content = $content;
        $task->save();
        return redirect('/tasks');
    }

    public function destroy(Request $request, $id)
    {
        Task::destroy($id);
        return redirect('/tasks');
    }
}
