@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Employee</h5>

                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{ old('name', $employee->user->name) }}" class="form-control" id="floatingName" name="name"
                                placeholder="Your Name">
                            <label for="floatingName">Your Name</label>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" value="{{ old('email', $employee->user->email) }}" class="form-control" id="floatingEmail"
                                name="email" placeholder="Your Email">
                            <label for="floatingEmail">Your Email</label>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password (leave blank to keep current)</label>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{ old('job_title', $employee->job_title) }}" class="form-control" id="floatingJob_title"
                                name="job_title" placeholder="job_title">
                            <label for="floatingJob_title">job_title</label>
                          <span class="text-danger">
                                @error('job_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{ old('experties', $employee->experties) }}" class="form-control" id="floatingExperties"
                                name="experties" placeholder="Experties">
                            <label for="floatingExperties">experties</label>
                            <span class="text-danger">
                                @error('experties')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="floatingJobType" name="job_contract_type" aria-label="Job Contract Type">
                                <option value="" disabled>Select Job Type</option>
                                <option value="full_time" {{ old('job_contract_type', $employee->job_contract_type) == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part_time" {{ old('job_contract_type', $employee->job_contract_type) == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                <option value="internship" {{ old('job_contract_type', $employee->job_contract_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                <option value="contract" {{ old('job_contract_type', $employee->job_contract_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                            <label for="floatingJobType">Job Contract Type</label>
                            <span class="text-danger">
                                @error('job_contract_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
        </div>
    </div>
@endsection