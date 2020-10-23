<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tasks/index', [
           'categories' => Auth::user()->categories
        ]);
    }

    public function create(Request $request)
    {
        $content = $request->input('content');
        $category_id = $request->input('category_id');

        $success = Task::create(
            ['content'=>$content, 'category_id'=>$category_id]
        );
        if( $success ) {
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
        $task = Task::find($id);
        $success = $task->update(
            ['content' => $request->input('content')]
        );
        if ( $success ) {
            return redirect('/tasks');
        }
    }

    public function destroy(Request $request, $id)
    {
        Task::destroy($id);
        return redirect('/tasks');
    }
}
