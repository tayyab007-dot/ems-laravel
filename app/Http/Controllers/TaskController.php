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










// namespace App\Http\Controllers;

// use App\Models\Task;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         if(auth()->user()->role == 'manager') {
//             $tasks = Task::all();
//         } else {
//             $tasks = Task::where('created_by', auth()->id())->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can create tasks');
//         }
//         return view('tasks.create');
//     }

//     public function store(Request $request)
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can create tasks');
//         }

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required',
//             'due_date' => 'nullable|date',
//         ]);

//         Task::create([
//             'title' => $request->title,
//             'description' => $request->description,
//             'due_date' => $request->due_date,
//             'status' => 'pending',
//             'created_by' => auth()->id(),
//         ]);

//         return redirect()->route('tasks.index')->with('success', 'Task created!');
//     }

//     public function markAsCompleted(Task $task)
//     {
//         if(auth()->user()->role == 'manager' || $task->created_by == auth()->id()) {
//             $task->update(['status' => 'completed']);
//             return back()->with('success', 'Task completed!');
//         }

//         abort(403);
//     }

//     public function destroy(Task $task)
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can delete tasks');
//         }

//         $task->delete();
//         return back()->with('success', 'Task deleted!');
//     }
// }











// namespace App\Http\Controllers;

// use App\Models\Task;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         if(auth()->user()->role == 'manager') {
//             // Managers see all tasks
//             $tasks = Task::with('creator')->get();
//         } else {
//             // Employees see tasks assigned to them through TaskAssignment
//             $tasks = Task::whereHas('assignments', function($query) {
//                 $query->where('employee_id', auth()->id());
//             })->with('creator')->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can create tasks');
//         }
//         return view('tasks.create');
//     }

//     public function store(Request $request)
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can create tasks');
//         }

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required',
//             'due_date' => 'nullable|date',
//         ]);

//         $task = Task::create([
//             'title' => $request->title,
//             'description' => $request->description,
//             'due_date' => $request->due_date,
//             'status' => 'pending',
//             'created_by' => auth()->id(),
//         ]);

//         return redirect()->route('tasks.index')->with('success', 'Task created!');
//     }

//     public function markAsCompleted(Task $task)
//     {
//         if(auth()->user()->role == 'manager' || 
//            $task->assignments()->where('employee_id', auth()->id())->exists()) {
//             $task->update(['status' => 'completed']);
//             return back()->with('success', 'Task completed!');
//         }

//         abort(403);
//     }

//     public function destroy(Task $task)
//     {
//         if(auth()->user()->role != 'manager') {
//             abort(403, 'Only managers can delete tasks');
//         }

//         $task->delete();
//         return back()->with('success', 'Task deleted!');
//     }
// }










// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         if(auth()->user()->hasRole('manager')) {
//             $tasks = Task::with('creator')->get();
//         } else {
//             // Only show tasks assigned to this employee through assignments
//             $tasks = Task::whereHas('assignments', function($query) {
//                 $query->where('employee_id', auth()->id());
//             })->with('creator')->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         // Only managers can create tasks
//         if(!auth()->user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }
//         return view('tasks.create');
//     }

//     public function store(Request $request)
//     {
//         // Only managers can create tasks
//         if(!auth()->user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required',
//             'due_date' => 'nullable|date',
//         ]);

//         Task::create([
//             'title' => $request->title,
//             'description' => $request->description,
//             'due_date' => $request->due_date,
//             'status' => 'pending',
//             'created_by' => Auth::id(),
//         ]);

//         return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
//     }

//     public function markAsCompleted(Task $task)
//     {
//         // Only allow if employee is assigned to this task or is manager
//         if(auth()->user()->hasRole('manager') || 
//            $task->assignments()->where('employee_id', auth()->id())->exists()) {
//             $task->update(['status' => 'completed']);
//             return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
//         }

//         abort(403, 'Unauthorized action.');
//     }

//     public function destroy(Task $task)
//     {
//         // Only managers can delete tasks
//         if(!auth()->user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }
// }














// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {

//     public function index()
//     {
//         if (Auth::user()->hasRole('manager')) {
//             $tasks = Task::all();
//         } else {
//             $tasks = Task::whereHas('assignments', function ($query) {
//                 $query->where('employee_id', Auth::id());
//             })->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

/**
 * Show the form for creating a new task (manager only).
 */
// public function create()
// {
//     if (!Auth::user()->hasRole('manager')) {
//         abort(403, 'Unauthorized action.');
//     }

//     return view('tasks.create');
// }


// public function store(Request $request)
// {
//     if (!Auth::user()->hasRole('manager')) {
//         abort(403, 'Unauthorized action.');
//     }

//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required',
//         'due_date' => 'nullable|date',
//     ]);

//     Task::create([
//         'title'       => $request->title,
//         'description' => $request->description,
//         'due_date'    => $request->due_date,
//         'status'      => 'pending',
//         'created_by'  => Auth::id(),
//     ]);

//     return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
// }


// public function markAsCompleted(Task $task)
// {
//     if (
//         Auth::user()->hasRole('manager') ||
//         $task->assignments()->where('employee_id', Auth::id())->exists()
//     ) {
//         $task->update(['status' => 'completed']);
//             return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
//         }

//         abort(403, 'Unauthorized action.');
//     }

//     public function destroy(Task $task)
// {
//     $task->delete();

//     return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
// }

// }










// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {
//     public function __construct()
//     {
//         // Apply Spatie permission middleware
//         $this->middleware('permission:create tasks')->only(['create', 'store']);
//         $this->middleware('permission:delete tasks')->only(['destroy']);
//         $this->middleware('permission:view tasks')->only(['index']);
//         $this->middleware('permission:update tasks status')->only(['markAsCompleted']);
//     }

//     /**
//      * Display a listing of tasks.
//      * Managers see all tasks, employees see only their own.
//      */
//     public function index()
//     {
//         if (Auth::user()->hasRole('manager')) {
//             $tasks = Task::all();
//         } else {
//             $tasks = Task::whereHas('assignments', function ($query) {
//                 $query->where('employee_id', Auth::id());
//             })->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

//     /**
//      * Show the form for creating a new task (manager only).
//      */
//     public function create()
//     {
//         return view('tasks.create');
//     }

//     /**
//      * Store a newly created task in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'title'       => 'required|string|max:255',
//             'description' => 'required',
//             'due_date'    => 'nullable|date',
//         ]);

//         Task::create([
//             'title'       => $request->title,
//             'description' => $request->description,
//             'due_date'    => $request->due_date,
//             'status'      => 'pending',
//             'created_by'  => Auth::id(),
//         ]);

//         return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
//     }

//     /**
//      * Mark the given task as completed.
//      */
//     public function markAsCompleted(Task $task)
//     {
//         if (
//             Auth::user()->hasRole('manager') ||
//             $task->assignments()->where('employee_id', Auth::id())->exists()
//         ) {
//             $task->update(['status' => 'completed']);
//             return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
//         }

//         abort(403, 'Unauthorized action.');
//     }

//     /**
//      * Remove the specified task from storage.
//      */
//     public function destroy(Task $task)
//     {
//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }
// }








// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {

//     public function index()
//     {
//         if (!Auth::user()->can('view tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         if (Auth::user()->hasRole('manager')) {
//             $tasks = Task::all();
//         } else {
//             $tasks = Task::whereHas('assignments', function ($query) {
//                 $query->where('employee_id', Auth::id());
//             })->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }


//     public function create()
//     {
//         if (!Auth::user()->can('create tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         return view('tasks.create');
//     }


//     public function store(Request $request)
//     {
//         if (!Auth::user()->can('create tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         $request->validate([
//             'title'       => 'required|string|max:255',
//             'description' => 'required',
//             'due_date'    => 'nullable|date',
//         ]);

//         Task::create([
//             'title'       => $request->title,
//             'description' => $request->description,
//             'due_date'    => $request->due_date,
//             'status'      => 'pending',
//             'created_by'  => Auth::id(),
//         ]);

//         return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
//     }

//    // In TaskController.php
// public function markAsCompleted(Task $task)
// {
//     if (!Auth::user()->can('update task status')) { // Must match seeder exactly
//         abort(403, 'Unauthorized');
//     }

//     // Allow both managers and assigned employees
//     if (Auth::user()->hasRole('manager') || 
//         $task->assignments()->where('employee_id', Auth::id())->exists()) {
//         $task->update(['status' => 'completed']);
//         return back()->with('success', 'Task completed!');
//     }

//     abort(403);
// }


//     public function destroy(Task $task)
//     {
//         if (!Auth::user()->can('delete tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }
// }







// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         if (!Auth::user()->can('view tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         if (Auth::user()->hasRole('manager')) {
//             $tasks = Task::all();
//         } else {
//             // FIXED: Use correct relationship name
//             $tasks = Task::whereHas('assignments', function ($query) {
//                 $query->where('employee_id', Auth::id());
//             })->get();
//         }

//         return view('tasks.index', compact('tasks'));
//     }

//     // ... other methods unchanged ...

//      public function create()
//     {
//         if (!Auth::user()->can('create tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         return view('tasks.create');
//     }


//     public function store(Request $request)
//     {
//         if (!Auth::user()->can('create tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         $request->validate([
//             'title'       => 'required|string|max:255',
//             'description' => 'required',
//             'due_date'    => 'nullable|date',
//         ]);

//         Task::create([
//             'title'       => $request->title,
//             'description' => $request->description,
//             'due_date'    => $request->due_date,
//             'status'      => 'pending',
//             'created_by'  => Auth::id(),
//         ]);     
//         return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
// //    

//     }
//     public function markAsCompleted(Task $task)
//     {
//         // FIXED: Match seeder permission name
//         if (!Auth::user()->can('update task status')) {
//             abort(403, 'Unauthorized');
//         }

//         // Allow both managers and assigned employees
//         if (Auth::user()->hasRole('manager') || 
//             $task->assignments()->where('employee_id', Auth::id())->exists()) 
//         {
//             $task->update(['status' => 'completed']);
//             return back()->with('success', 'Task completed!');
//         }

//         abort(403);
//     }

//     public function destroy(Task $task)
//     {
//         if (!Auth::user()->can('delete tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }
// }