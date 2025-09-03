@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    <div class="pagetitle mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold text-primary mb-1">
                <i class="bi bi-people-fill me-2"></i> Employee Dashboard
            </h1>
            <p class="text-muted">Manage employees, view details, and perform actions.</p>
        </div>
        @role('manager')
            <a href="{{ route('employees.create') }}" class="btn btn-primary px-3 shadow-sm">
                <i class="bi bi-person-plus me-1"></i> Add Employee
            </a>
        @endrole
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold text-dark">
                <i class="bi bi-list-ul me-2"></i> All Employees
            </h5>
        </div>

        <div class="card-body p-4">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th><i class="bi bi-person-badge-fill me-1"></i> Name</th>
                            <th><i class="bi bi-envelope-fill me-1"></i> Email</th>
                            <th><i class="bi bi-briefcase-fill me-1"></i> Job Title</th>
                            <th><i class="bi bi-lightbulb-fill me-1"></i> Expertise</th>
                            <th><i class="bi bi-file-earmark-text-fill me-1"></i> Contract</th>
                            @role('manager')
                                <th><i class="bi bi-gear-fill me-1"></i> Actions</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="fw-semibold">{{ $employee->user->name }}</td>
                                <td>{{ $employee->user->email }}</td>
                                <td>{{ $employee->job_title }}</td>
                                <td>{{ $employee->experties }}</td>
                                <td><span class="badge bg-warning  text-dark">{{ $employee->job_contract_type }}</span></td>
                                @role('manager')
                                    <td>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash3"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover { background-color: #f8fbff; transition: 0.2s; }
</style>
@endsection


















