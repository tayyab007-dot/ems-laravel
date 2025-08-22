








@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Task Assignment</h4>
                    <a href="{{ route('tasks-assign.index') }}" class="btn btn-sm btn-outline-primary float-end"> 
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                      


                <div class="card-body p-4">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @can('assign tasks')
                        <form action="{{ route('tasks-assign.store') }}" method="POST">
                            @csrf

                            {{-- Select Task --}}
                            <div class="mb-4">
                                <label for="task_id" class="form-label fw-semibold">Select Task</label>
                                <select name="task_id" id="task_id" class="form-select shadow-sm" required>
                                    <option value="" selected disabled>-- Choose a Task --</option>
                                    @foreach ($tasks as $task)
                                        <option value="{{ $task->id }}" {{ old('task_id') == $task->id ? 'selected' : '' }}>
                                            {{ $task->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Assign Employees --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Assign to Employees</label>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle w-100 text-start shadow-sm" 
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Employees
                                    </button>
                                    <ul class="dropdown-menu w-100 p-3 border-0 shadow-lg" style="max-height: 300px; overflow-y: auto;">
                                        @foreach ($employees as $employee)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" 
                                                           name="employee_ids[]" 
                                                           value="{{ $employee->user->id }}"
                                                           id="emp{{ $employee->id }}"
                                                           {{ in_array($employee->user->id, old('employee_ids', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="emp{{ $employee->id }}">
                                                        <strong>{{ $employee->user->name }}</strong>
                                                        <span class="text-muted">({{ $employee->job_title }})</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-outline-success "> 
                                    <i class="bi bi-check2-circle"></i> Assign Task
                                </button>
                                <a href="{{ route('tasks-assign.index') }}" class="btn btn-danger px-4 hover-shadow">
                                    <i class="bi bi-x-circle"></i> Cancel
                                </a>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger mt-3">
                            🚫 You do not have permission to assign tasks.
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>


































{{-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Assign Task</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('assign tasks')
        
    

    


        <form action="{{ route('tasks-assign.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="task_id" class="form-label">Select Task</label>
                    <select name="task_id" id="task_id" class="form-select" required>
                        <option value="" selected disabled>-- Choose Task --</option>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}" {{ old('task_id') == $task->id ? 'selected' : '' }}>
                                {{ $task->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Assign to Employees</label>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle w-100 text-start" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Select Employees
                        </button>
                        <ul class="dropdown-menu w-100 p-3" style="max-height: 250px; overflow-y: auto;">
                            @foreach ($employees as $employee)
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="employee_ids[]"
                                               value="{{ $employee->user->id }}"
                                               id="emp{{ $employee->id }}"
                                               {{ in_array($employee->user->id, old('employee_ids', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="emp{{ $employee->id }}">
                                            {{ $employee->user->name }} ({{ $employee->job_title }})
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Assign Task</button>
            <a href="{{ route('tasks-assign.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @else
        <div class="alert alert-danger mt-3">
            You do not have permission to assign tasks.
        </div>
    @endcan
</div>
@endsection --}}
