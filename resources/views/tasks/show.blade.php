{{-- @extends('layouts.app') --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border">
                <div class="card-header">
                    <h2 class="h4 mb-0">Task Details</h2>
                    <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-primary float-end"><i class="bi bi-arrow-left"></i> Back to Tasks</a>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="">{{ $task->title }}</h3>
                            <p class="lead">{{ $task->description }}</p>
                            
                            <div class="mt-4">
                                <h5 class="h6">Details</h5>
                                <table class="table table-sm table-borderless border">
                                    <tbody>
                                        <tr class="border-bottom">
                                            <th class="text-nowrap" scope="row">Status:</th>
                                            <td>
                                                <span class="badge rounded-pill bg-{{ $task->status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($task->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="text-nowrap" scope="row">Due Date:</th>
                                            <td>{{ $task->due_date ?? 'Not set' }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="text-nowrap" scope="row">Created By:</th>
                                            <td>{{ $task->creator->name ?? 'Unknown' }}</td>
                                        </tr>

                                        

                                        <tr>
                                            <th class="text-nowrap" scope="row">Created At:</th>
                                            <td>{{ $task->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card shadow-sm border">
                                <div class="card-header">
                                    <h5 class="h6">Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        @if($task->status === 'pending')
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn btn-outline-success" onclick="return confirm('Are you sure you want to mark this task as completed?')">
                                                    Mark as Completed
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @can('delete tasks')
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this task?')">
                                                    Delete Task
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







{{-- 

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Task Details</h2>
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-primary">Back to Tasks</a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h3>{{ $task->title }}</h3>
                    <p class="lead">{{ $task->description }}</p>
                    
                    <div class="mt-4">
                        <h5>Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Status:</strong> 
                                <span class="badge bg-{{ $task->status === 'completed' ? 'success' : 'warning' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Due Date:</strong> {{ $task->due_date ?? 'Not set' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Created By:</strong> {{ $task->creator->name ?? 'Unknown' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Created At:</strong> {{ $task->created_at->format('M d, Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Actions</h5>
                        </div>
                        <div class="card-body">
                            @if($task->status === 'pending')
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-success w-100 mb-2">
                                        Mark as Completed
                                    </button>
                                </form>
                            @endif
                            
                            @can('delete tasks')
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">
                                        Delete Task
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 



 --}}
