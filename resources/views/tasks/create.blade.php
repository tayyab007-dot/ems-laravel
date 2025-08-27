



@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-primary"> Create Task</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('create tasks')
        
   
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required value="{{ old('due_date') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @else
        <div class="alert alert-danger mt-3">
            You do not have permission to create tasks.
        </div>
     @endcan
</div>
@endsection
