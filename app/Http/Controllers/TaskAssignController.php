<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use App\Models\TaskAssignment;
use Illuminate\Http\Request;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Traits\HasRoles;

class TaskAssignController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole("manager")){
        $assignments = TaskAssignment::with(['task', 'manager', 'employee'])->get();
        }
        else{
            $assignments = TaskAssignment::where('employee_id', auth()->id())
            ->with(['task', 'manager'])
            ->get();
        }
        return view('tasks-assign.index', compact('assignments'));
    }



    public function create(): View
    {
        $tasks = Task::all();
        $employees = Employee::with('user')->get();
        
        return view('tasks-assign.create', compact('tasks', 'employees'));
    }

    public function test()
    {
        $tasks = Task::all();
        $employees = Employee::with('user')->get();

        $names = [];
        foreach ($employees as $employee) {
            $names[] = $employee->user->name;
        }
        dd($tasks, $names);
    }


    public function store(Request $request)
    {

        if (auth()->user()->hasRole('manager')) {
            $request->validate([
                'task_id' => 'required|exists:tasks,id',
                'employee_ids' => 'required|array',
                'employee_ids.*' => 'exists:users,id',
            ]);

            foreach ($request->employee_ids as $employeeId) {
                TaskAssignment::create([
                    'task_id' => $request->task_id,
                    'employee_id' => $employeeId,
                    'manager_id' => auth()->user()->id,
                ]);

            }
            return redirect()->route('tasks-assign.index')->with('success', 'Task assigned successfully!');
        } else {
            return redirect()->back()->withErrors(['You do not have permission to assign tasks.']);
        }
    }

}


// namespace App\Http\Controllers;

// use App\Models\Task;
// use App\Models\Employee;
// use App\Models\TaskAssignment;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\View\View;

// class TaskAssignController extends Controller
// {

//     public function index()
//     {
//         if (!Auth::user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $assignments = TaskAssignment::with(['task', 'manager', 'employee'])->get();
//         return view('tasks-assign.index', compact('assignments'));
//     }

  
//     public function create(): View
//     {
//         if (!Auth::user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $tasks = Task::all();
//         $employees = Employee::with('user')->get();

//         return view('tasks-assign.create', compact('tasks', 'employees'));
//     }

   
//     public function store(Request $request)
//     {
//         if (!Auth::user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $request->validate([
//             'task_id'       => 'required|exists:tasks,id',
//             'employee_ids'  => 'required|array',
//             'employee_ids.*'=> 'exists:users,id',
//         ]);

//         foreach ($request->employee_ids as $employeeId) {
//             TaskAssignment::create([
//                 'task_id'     => $request->task_id,
//                 'employee_id' => $employeeId,
//                 'manager_id'  => Auth::id(),
//             ]);
//         }

//         return redirect()->route('tasks-assign.index')->with('success', 'Task assigned successfully!');
//     }
// }










// namespace App\Http\Controllers;

// use App\Models\Task;
// use App\Models\Employee;
// use App\Models\TaskAssignment;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class TaskAssignController extends Controller
// {
//     public function index()
//     {
//         if (!Auth::user()->can('view tasks')) {
//             abort(403, 'Unauthorized');
//         }

//         // Show only relevant assignments
//         if (Auth::user()->hasRole('manager')) {
//             $assignments = TaskAssignment::with(['task', 'manager', 'employee'])->get();
//         } else {
//             $assignments = TaskAssignment::with(['task', 'manager', 'employee'])
//                 ->where('employee_id', Auth::id())
//                 ->get();
//         }

//         return view('tasks-assign.index', compact('assignments'));
//     }

//     public function create() 
//     {
//         if (!Auth::user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $tasks = Task::all();
//         $employees = Employee::with('user')->get();

//         return view('tasks-assign.create', compact('tasks', 'employees'));
//     }

   
//     public function store(Request $request)
//     {
//         if (!Auth::user()->hasRole('manager')) {
//             abort(403, 'Unauthorized action.');
//         }

//         $request->validate([
//             'task_id'       => 'required|exists:tasks,id',
//             'employee_ids'  => 'required|array',
//             'employee_ids.*'=> 'exists:users,id',
//         ]);

//         foreach ($request->employee_ids as $employeeId) {
//             TaskAssignment::create([
//                 'task_id'     => $request->task_id,
//                 'employee_id' => $employeeId,
//                 'manager_id'  => Auth::id(),
//             ]);
//         }

//         return redirect()->route('tasks-assign.index')->with('success', 'Task assigned successfully!');
//     }

//     // ... create() and store() remain unchanged ...
// }