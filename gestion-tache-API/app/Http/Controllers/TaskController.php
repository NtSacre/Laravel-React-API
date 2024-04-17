<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            
            'tasks'=> Task::all()
        ]);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        return response()->json([
            'message' => 'Tasks stored successfully.',
           'task' =>$task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json([
            'task'=>$task
        ], 200);
    }
    /**
     * Update the status of task in done.
     */
    public function taskDone(Task $task)
    {
        $task->status = 'done';
        return response()->json([
            'message'=> 'Task marked as done.',
            'task'=>$task
        ], 200);
    }
/**
     * Update the status of task in done.
     */
    public function taskToDo(Task $task)
    {
        $task->status = 'to_do';
        return response()->json([
            'message'=> 'Task marked as to do.',
            'task'=>$task
        ], 200);
    }

    /**
     * Update the status of task in done.
     */
    public function taskDoing(Task $task)
    {
        $task->status = 'doing';
        return response()->json([
            'message'=> 'Task marked as doing.',
            'task'=>$task
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return response()->json([
            'task' => $task,
           'message' => 'Task updated successfully.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
           'message' => 'Task deleted successfully.'
        ], 200);
    }
}
