<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use App\Models\TaskAssignment;



use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'employeeCount' => Employee::count(),
            'taskCount' => Task::count(),
            'taskAssignCount' => TaskAssignment::count(),
            'completedTaskCount' => Task::where('status', 'completed')->count(),
            'pendingTaskCount' => Task::where('status', 'pending')->count(),

        ]);
    }
}
