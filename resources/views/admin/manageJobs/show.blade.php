@extends('admin.layouts.app')

@section('title', ucwords($viewAppliedJob->title))
@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> @yield('title') </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="{{ route('manage.appliedjobs') }}" class="btn btn-outline-info"><i
                                class="fas fa-university"></i> Job Applications</a></h3>
                </div>
                <div class="card-body text-center">
                       
                        <table class="table table-hover text-left">
                            <tr>
                                <th>Job Title</th>
                                <td>{{ ucwords($viewAppliedJob->title) }}</td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td>{{ ucwords($viewAppliedJob->company) }}</td>
                            </tr>
                            <tr>
                                <th>Private key:</th>
                                <td><b>{{ $viewAppliedJob->job_token }}</b></td>
                            </tr>
                            <tr>
                                <th>Application Date: </b></th>
                                <td><b>{{ \Carbon\Carbon::parse($viewAppliedJob->applied_date)->diffForHumans() }}</b></td>
                            </tr>
                            <tr>
                                <th>Location : </b></th>
                                <td>{{ ucwords($viewAppliedJob->location) }} </td>
                            </tr>
                            <tr>
                                <th>Salary: </th>
                                <td>$ {{ $viewAppliedJob->salary }}</td>
                            </tr>
                            <tr>
                                <th>User Email: </th>
                                <td>{{ $viewAppliedJob->user_email }}</td>
                            </tr>
                            <tr>
                                <th>Applied By: </th>
                                <td>{{ ucwords($viewAppliedJob->user_name) }}</td>
                            </tr>
                            <tr>
                                <th>Submitted CV: </th>
                                <td><a target="_blank" href="{{ url($viewAppliedJob->cv) }}" class="btn btn-info">View Resume</a></td>
                            </tr>
                            <tr>
                                <th>Status: </th>
                                <td>
                                    @if ($viewAppliedJob->job_status == 0)
                                        <p class="text-warning">Pending</p>
                                    @elseif ($viewAppliedJob->job_status == 1)
                                        <p class="text-info">Processing</p>
                                    @elseif ($viewAppliedJob->job_status == 2)
                                        <p class="text-success">Approved</p>
                                    @else
                                        <p class="text-danger">Loading ...</p>
                                    @endif
                                    <hr>
                                    <form method="post" action="{{ route('manage.appliedjobs.status', $viewAppliedJob->job_token) }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <select name="job_status" id="" class="form-control">
                                                <option value="">Select Application Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Processing</option>
                                                <option value="2">Approved</option>
                                            </select>
                                            @error('job_status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button style="width:100%" type="submit" class="btn btn-primary">Update Status</button>

                                    </form>
                                </td>
                            </tr>

                        </table>
<hr>
                        <div class="row">
                            <div class="col-12">
                                <h3>Job Requirements</h3>
                             <p class="lead" style="text-align:justify !important">{{ $viewAppliedJob->requirements }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h3>Required Skills</h3>
                             <p class="lead" style="text-align:justify !important">{{ $viewAppliedJob->skills }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h3>Job Description</h3>
                             <p class="lead" style="text-align:justify !important">{{ $viewAppliedJob->description }}</p>
                            </div>
                        </div>
                </div>

                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection


@section('scripts')

@endsection