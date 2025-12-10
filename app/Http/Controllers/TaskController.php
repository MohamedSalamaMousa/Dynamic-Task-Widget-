<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();

        return response()->json($tasks);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = auth()->user()->tasks()->create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        return response()->json($task, 201);
    }
    public function update(Task $task)
    {
        // Authorization: Ensure user owns this task
        if ($task->user_id !== auth()->id()) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        // Toggle completion status
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return response()->json($task);
    }
}