<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks/index', [
           'tasks' => $tasks
        ]);
    }

    public function create(Request $request)
    {
        $content = $request->input('content');
        $task = new Task();
        $task->content = $content;
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
