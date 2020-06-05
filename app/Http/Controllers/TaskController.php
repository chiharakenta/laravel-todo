<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('tasks/index', [
           'tasks' => $tasks
        ]);
    }

    public function create(Request $request)
    {
        $content = $request->input('content');
        DB::table('tasks')->insert(
              ['content' => $content]
        );
        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id)
    {
        $content = $request->input('content');
        DB::table('tasks')->where('id', $id)->update(['content' => $content]);
        return redirect('/tasks');
    }

    public function destroy(Request $request, $id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks');
    }
}
