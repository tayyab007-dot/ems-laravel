{{-- @include('layouts.header')
@section('content')
<div class="pagetitle">
    <h1>Manager Profile</h1>
</div>
@endsection
@include('layouts.footer') --}}





@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="pagetitle">
            <h1>Manager Dashboard</h1>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
               <div class=" py-4 d-flex justify-content-between align-items-center" >
                 <h5 class="card-title">All Managers</h5>
                <a href="{{ route('managers.create') }}" class="btn btn-primary mb-3">Create Manager</a>
               </div>
                 <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                <b>Name</b>
                            </th>
                            <th>Job Title.</th>
                            <th>Experties</th>                         
                            <th>Task</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unity Pugh</td>
                            <td>9958</td>
                            <td>Curicó</td>
                            <td>2005/02/11</td>
                            <td>37%</td>
                        </tr>
                       
                           
                      
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
@endsection