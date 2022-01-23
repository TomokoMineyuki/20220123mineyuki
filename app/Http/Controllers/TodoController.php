<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = Task::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $task = new Task;
        $task->created_at = $request->created_at;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }
    public function update(Request $request)
    {
        return redirect('/');
    }
    public function delete(Request $request)
    {
        return redirect('/');
    }

}
