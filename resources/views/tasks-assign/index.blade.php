@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <div class="pagetitle mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold text-primary mb-1">
                <i class="bi bi-diagram-3-fill me-2"></i> Task Assignments
            </h1>
            <p class="text-muted">Assign tasks to employees and track responsibility.</p>
        </div>
        @role('manager')
            <a href="{{ route('tasks-assign.create') }}" class="btn btn-primary px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> New Assignment
            </a>
        @endrole
    </div>

   <div class="row g-4">
    @foreach ($assignments as $assignment)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 transition-all"
                 style="transition: transform 0.2s, box-shadow 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 6px 16px rgba(0,0,0,0.12)';"
                 onmouseout="this.style.transform='';this.style.boxShadow='';">

                <div class="card-body p-4">
                    <!-- Task Title -->
                    <h5 class="card-title fw-bold text-primary d-flex align-items-center mb-3">
                        <i class="bi bi-clipboard-check-fill me-2 text-primary"></i>
                        {{ $assignment->task->title }}
                    </h5>

                    <!-- Info Section -->
                    <ul class="list-unstyled small mb-4">
                        <li class="mb-2">
                            <i class="bi bi-person-fill text-secondary me-2"></i>
                            <span class="fw-semibold">Assigned to:</span>
                            {{ $assignment->employee->name ?? 'N/A' }}
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-person-badge-fill text-secondary me-2"></i>
                            <span class="fw-semibold">By:</span>
                            {{ $assignment->task->creator->name ?? 'N/A' }}
                        </li>
                        <li>
                            <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                            <span class="fw-semibold">Assigned on:</span>
                            {{ $assignment->created_at->format('M d, Y') }}
                        </li>
                    </ul>

                    <!-- Actions -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('tasks.show', $assignment->task->id) }}"
                           class="btn btn-sm btn-primary px-3 rounded-pill shadow-sm">
                            <i class="bi bi-eye-fill me-1"></i> View
                        </a>

                        @role('manager')
                            <form action="{{ route('tasks.destroy', $assignment->task->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger px-3 rounded-pill shadow-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                    <i class="bi bi-trash-fill me-1"></i> Delete
                                </button>
                            </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

<style>
    .table-hover tbody tr:hover { background-color: #f8fbff; transition: 0.2s; }
</style>
@endsection
