<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskAssignController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:manager'])->group(function () {
//Manager Route
Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
Route::post('/add-manager', [ManagerController::class, 'store'])->name('addManager');

// Employees
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/add-employee', action: [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// Tasks Assign
Route::get('/tasks-assign', [TaskAssignController::class, 'index'])->name('tasks-assign.index');
Route::get('/tasks-assign/create', [TaskAssignController::class, 'create'])->name('tasks-assign.create');
Route::post('/tasks-assign', [TaskAssignController::class, 'store'])->name('tasks-assign.store');

// Tasks
// Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/managers', [ManagerController::class, 'store'])->name('managers.store');

});

//Employee Route
Route::middleware(['auth', 'role:employee'])->group(function () {
// Route::get('/employee/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsCompleted'])->name('tasks.complete');
});

//  -------------THESE ROUTES ARE ASSESABLE BY ALL USERS-------------

//Task
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks.index');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

//Task-Assign
Route::get('/tasks-assign', [TaskAssignController::class, 'index'])->name('tasks-assign.index');
Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsCompleted'])->name('tasks.complete');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

//Employee        

// Test(just for test)
Route::get('/test', [TaskAssignController::class, 'test'])->name('test');

require __DIR__ . '/auth.php';










