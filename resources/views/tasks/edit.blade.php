



@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-primary"> Update Task</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @can('update tasks')
        
   
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="row g-3 needs-validation') }}" method="POST">
            @csrf
             @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $task->title) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required value="{{ old('due_date', $task->due_date) }}">
            </div>

            <div class="text-center">

            <button type="submit" class="btn btn-primary">Update Task</button>
             <button type="reset" class="btn btn-secondary">Reset</button>
             {{-- <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button> --}}
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @else
        <div class="alert alert-danger mt-3">
            You do not have permission to create tasks.
        </div>
     @endcan
</div>
@endsection



