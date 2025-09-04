<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function index()
    {
       $employees = Employee::with('user')->get();
       return view('employees.index', compact('employees'));
     }

    public function create()
    {
        return view('employees.create'); // This should match the blade file you'll create
    }
   
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'job_title' => 'required',
            'experties' => 'required',
            'job_contract_type' => 'required',
        ]);

        // Create user
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        // Create employee
        Employee::create([
            'user_id' => $user->id,
            'job_title' => $req->job_title,
            'experties' => $req->experties,
            'job_contract_type' => $req->job_contract_type,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }



    // show single employee
    public function show(Employee $employee){
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee){
        return view('employees.edit', compact('employee'));
    }
   
    public function update(Request $req, Employee $employee)
{
    $req->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$employee->user_id,
        'password' => 'nullable|min:6',
        'job_title' => 'required',
        'experties' => 'required',
        'job_contract_type' => 'required',
    ]);

    // Update user
    $user = $employee->user;
    $user->name = $req->name;
    $user->email = $req->email;
    
    if ($req->password) {
        $user->password = Hash::make($req->password);
    }
    
    $user->save();

    // Update employee
    $employee->update([
        'job_title' => $req->job_title,
        'experties' => $req->experties,
        'job_contract_type' => $req->job_contract_type,
    ]);
    
    return redirect()->route('employees.index')->with('success','Employee updated successfully');
}

    // public function destroy(int $id){
       
    //     $employee = Employee::find($id);
        
    //     $employee->delete();
    //     // Employee::destroy($id);
    //     // Employee::destroy(6,8);
        
    //     return redirect()->route('employees.index')->with('status','employee deleted successfully');
    // }

    public function destroy(int $id)
{
    $employee = Employee::find($id);
    
    if ($employee) {
        // Get the user before deleting the employee
        $user = $employee->user;
        
        // Delete the employee (using soft delete if implemented)
        $employee->delete();
        
        // If you want to completely remove user access, also delete the user
        if ($user) {
            $user->delete();
        }
    }
    
    return redirect()->route('employees.index')->with('status', 'Employee deleted successfully');
}
}