@extends('layouts.app')


@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Manager</h5>

           <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('addManager') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" value="{{ old('name') }}" class="form-control" id="floatingName" name="name"
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
                            <input type="email" value="{{ old('email') }}" class="form-control" id="floatingEmail"
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
                            <label for="floatingPassword">password</label>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{ old('job_title') }}" class="form-control" id="floatingJob_title"
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
                            <input type="text" value="{{ old('experties') }}" class="form-control" id="floatingExperties"
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
                            <select class="form-select" id="floatingJobType" value="{{ old('job_contract_type') }}"
                                name="job_contract_type" aria-label="Job Contract Type">
                                <option selected disabled>Select Job Type</option>
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="internship">Internship</option>
                                <option value="contract">Contract</option>
                            </select>
                            <label for="floatingJobType">Job Contract Type</label>
                    
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" value="{{ old('number') }}" class="form-control" id="floatingNumber"
                                name="number" placeholder="Number">
                            <label for="floatingNumber">Number</label>
                            <span class="text-danger">
                                @error('number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Address" id="floatingTextarea" name="address"
                                style="height: 100px;">{{ old('address') }}</textarea>
                            <label for="floatingTextarea">Address</label>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End floating Labels Form -->

        </div>
    </div>
</div>

@endsection