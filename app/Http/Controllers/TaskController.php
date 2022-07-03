<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->company->tasks;

        return view('tasks.index', compact('tasks'));
    }

    public function show(int $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }
}

