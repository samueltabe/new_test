<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = Task::whereHas('activity', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('tasks.index', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $activities = Activity::where('user_id', $user->id)->get();
        return view('tasks.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'activity_id' => 'required|exists:activities,id',
        ]);
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'activity_id' => $request->activity_id,
        ]);


        session()->flash('success', 'Task created successfully!');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $user = Auth::user();
        $activities = Activity::where('user_id', $user->id)->get();
        return view('tasks.create')
        ->with('task', $task)
        ->with('activities', $activities);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->only(['name', 'description', 'activity_id']);


        $task->update($data);

        session()->flash('success','Task updated successfully');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);


        $task->delete();

        session()->flash('success', 'Task deleted successfully');

        return redirect(route('tasks.index'));
    }
}
