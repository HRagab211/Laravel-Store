<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add(Request $request)
        {
            $request->validate([
                'task'=>'required',
            ]);
            Task::create([
                'task_name'=>$request->task
            ]);

            return back()->with('success','Task is added successfully');
        }
    public function done(Task $task)
    {

      $task->status='1';
      $task->updated_at=now();
      $task->save();
    return back();  
    }   
}
