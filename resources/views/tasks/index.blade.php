@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <div class="pagetitle mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold text-primary mb-1">
                <i class="bi bi-check2-square me-2"></i> Task Dashboard
            </h1>
            <p class="text-muted">View and manage all tasks assigned to employees.</p>
        </div>
        @role('manager')
            <a href="{{ route('tasks.create') }}" class="btn btn-primary px-3 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> New Task
            </a>
        @endrole
    </div>

   <div class="row g-4">
    @foreach ($tasks as $task)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 transition-all"
                 style="transition: transform 0.2s, box-shadow 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 6px 16px rgba(0,0,0,0.12)';"
                 onmouseout="this.style.transform='';this.style.boxShadow='';">

                <div class="card-body p-4">
                    <!-- Title -->
                    {{-- <h5 class="fw-bold text-primary mb-3 d-flex align-items-center">
                        <i class="bi bi-clipboard-check-fill me-2 text-primary"></i>
                        {{ $task->title }}
                    </h5> --}}
                     <h5 class="card-title fw-bold text-primary d-flex align-items-center mb-3">
                        <i class="bi bi-clipboard-check-fill me-2 text-primary"></i>
                        {{ $task->title }}
                    </h5>

                    <!-- Description -->
                    <p class="text-muted small mb-3">{{ Str::limit($task->description, 100) }}</p>

                    <!-- Task Meta -->
                    <ul class="list-unstyled small mb-4">
                        <li class="mb-2">
                            <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                            <span class="fw-semibold">Due:</span>
                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                        </li>
                        <li>
                            <i class="bi bi-circle-half text-secondary me-2"></i>
                            <span class="fw-semibold">Status:</span>
                            <span class="badge px-3 py-1 rounded-pill 
                                {{ $task->status == 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </li>
                    </ul>

                    <!-- Action -->
                    <a href="{{ route('tasks.show', $task->id) }}"
                       class="btn btn-sm btn-primary px-3 rounded-pill shadow-sm">
                        <i class="bi bi-eye-fill me-1"></i> View
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

<style>
    .hover-card { transition: 0.3s; }
    .hover-card:hover { transform: translateY(-5px); box-shadow: 0 6px 16px rgba(0,0,0,0.1); }
</style>
@endsection

