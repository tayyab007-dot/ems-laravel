<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {

        if (auth()->user()->hasRole('manager')) {

            // $tasks = Task::with('creator')->get();
            $tasks = Task::all(); 
        } else {
            $tasks = Task::whereHas('assignments', function ($query) {
                $query->where('employee_id', auth()->id());
            })->with('creator')->get();

        }

        return view('tasks.index', compact('tasks'));
    }

  

    public function create()
    {
        return view('tasks.create');
    }

public function show(Task $task)
{
    // Check if user is manager OR assigned to this task
    if(auth()->user()->hasRole('manager') || 
       $task->assignments()->where('employee_id', auth()->id())->exists()) {
        return view('tasks.show', compact('task'));
    }
    
    abort(403); // If not authorized
}



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'pending',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // public function markAsCompleted(Task $task)
    // {
    //     if (
    //         auth()->user()->role == 'manager' ||
    //         $task->assignments()->where('employee_id', auth()->id())->exists()
    //     ) {
    //         $task->update(['status' => 'completed']);
    //         return redirect()->route('tasks.index')->with('success', 'Task marked is completed!');
    //     }
    //     abort(403);
    // }

public function markAsCompleted(Task $task)
    {
    if (
    auth()->user()->hasRole('manager') ||
    $task->assignments()->where('employee_id', auth()->id())->exists()
) {
    $task->update(['status' => 'completed']);
    return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
}

abort(403);

    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

}



