<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Notifications\TaskCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

        $notification = auth()->user()->notifications->where('data.id', $id);

        if ($notification) $notification->markAsRead();

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'type_id' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status_id' => $request->status ? 2 : 1,
            'customer_id' => $request->customer_id,
            'description' => $request->description,
            'company_id' => auth()->user()->company_id,
            'created_by_id' => auth()->user()->id,
            'assigned_user_id' => $request->assigned_user_id,
        ]);

        if ($request->has('assigned_user_id')) {
            Notification::send(auth()->user(), new TaskCreatedNotification([
                'name' => $request->name,
                'id' => $task->id,
                'notification_type' => 'tasks'
            ]));
        }

        return redirect()->to('/tasks')->with('success', 'Task created');
    }

    public function changeStatus(Request $request, Task $task)
    {
        $task->update([
            'status_id' => $request->status
        ]);

        return redirect()->back()->with('success', 'Task updated');
    }
}
