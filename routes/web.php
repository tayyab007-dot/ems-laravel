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
// Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit')->
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












// use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\ManagerController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\TaskAssignController;
// use App\Http\Controllers\TaskController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     // Profile Routes
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
//     //   Manager Routes
     
//     Route::middleware('role:manager')->prefix('manager')->group(function () {
//         // Manager Management
//         Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
//         Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
//         Route::post('/add-manager', [ManagerController::class, 'addManager'])->name('addManager');

//         // Employees Management
//         Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
//         Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
//         Route::post('/add-employee', [EmployeeController::class, 'addEmployee'])->name('addEmployee');
//         Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

//         // Tasks Assign (Manager Only)
//     Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
  
//         Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

//         Route::get('/tasks-assign/create', [TaskAssignController::class, 'create'])->name('tasks-assign.create');
//         Route::post('/tasks-assign', [TaskAssignController::class, 'store'])->name('tasks-assign.store');
//     });

    
//     //  Tasks Assign Index — accessible to both manager & employee
     
//     Route::get('/tasks-assign', [TaskAssignController::class, 'index'])->name('tasks-assign.index');

//     // Test Route
//     Route::get('/test', [TaskAssignController::class, 'test'])->name('test');

   
//     Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
//     Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('role:manager')->name('tasks.create');
//     Route::post('/tasks', [TaskController::class, 'store'])->middleware('role:manager')->name('tasks.store');

   
//     Route::middleware('role:employee')->group(function () {
//         Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsCompleted'])->name('tasks.complete');
//     });
// });

// require __DIR__ . '/auth.php';















// use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\ManagerController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\TaskAssignController;
// use App\Http\Controllers\TaskController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     // Profile Routes (All authenticated users)
//     Route::prefix('profile')->group(function () {
//         Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     });

//     // ----------------------------
//     // Manager-Only Routes
//     // ----------------------------
//     Route::middleware(['role:manager', 'permission:manage teams|manage employees'])->prefix('manager')->group(function () {
//         // Manager Management
//         Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
//         Route::get('/managers/create', [ManagerController::class, 'create'])->name('managers.create');
//         Route::post('/managers', [ManagerController::class, 'store'])->name('managers.store');

//         // Employee Management
//         Route::resource('employees', EmployeeController::class)->except(['show']);

//         // Task Assignment
//         Route::get('/tasks/assign', [TaskAssignController::class, 'create'])->name('tasks.assign.create');
//         Route::post('/tasks/assign', [TaskAssignController::class, 'store'])->name('tasks.assign.store');
//     });

//     // ----------------------------
//     // Task Routes (Shared)
//     // ----------------------------
//     Route::prefix('tasks')->group(function () {
//         // Index (Manager sees all, Employees see assigned)
//         Route::get('/', [TaskController::class, 'index'])->middleware('permission:view tasks')->name('tasks.index');
        
//         // Create/Store (Manager only)
//         Route::middleware(['role:manager', 'permission:create tasks'])->group(function () {
//             Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
//             Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
//             Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
//             Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
//             Route::patch('/{task}', [TaskController::class, 'update'])->name('tasks.update');
//         });

//         // Status Update (Both Manager and Assigned Employee)
//         Route::patch('/{task}/status', [TaskController::class, 'markAsCompleted'])
//             ->middleware('permission:update task status')
//             ->name('tasks.status.update');
//     });
// });

// require __DIR__ . '/auth.php';














// use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\ManagerController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\TaskAssignController;
// use App\Http\Controllers\TaskController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     // Profile Routes
//     Route::prefix('profile')->group(function () {
//         Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     });

//     // Manager Routes
//     Route::middleware(['role:manager'])->prefix('manager')->group(function () {
//         Route::resource('managers', ManagerController::class)->only(['index', 'create', 'store']);
//         Route::resource('employees', EmployeeController::class)->except(['show']);
//         Route::get('/tasks/assign', [TaskAssignController::class, 'create'])->name('tasks.assign.create');
//         Route::post('/tasks/assign', [TaskAssignController::class, 'store'])->name('tasks.assign.store');
//     });

//     // Task Routes (Shared)
//     Route::prefix('tasks')->group(function () {
//         // Accessible to all with 'view tasks' permission
//         Route::get('/', [TaskController::class, 'index'])
//             ->middleware('permission:view tasks')
//             ->name('tasks.index');
        
//         // Manager-only actions
//         Route::middleware(['role:manager'])->group(function () {
//             Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
//             Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
//             Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
//         });

//         // Status update (both manager and assigned employee)
//         Route::patch('/{task}/status', [TaskController::class, 'markAsCompleted'])
//             ->middleware('permission:update task status')
//             ->name('tasks.status.update');
//     });

//     // Task assignments index (accessible to both)
//     Route::get('/tasks-assign', [TaskAssignController::class, 'index'])
//         ->middleware('permission:view tasks')
//         ->name('tasks-assign.index');
// });

// require __DIR__ . '/auth.php';