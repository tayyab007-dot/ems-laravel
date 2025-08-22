<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'employeeCount' => Employee::count(),
            'taskCount' => Task::count()
        ]);
    }
}
