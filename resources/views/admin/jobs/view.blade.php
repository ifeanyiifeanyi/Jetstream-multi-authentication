@extends('admin.layouts.app')

@section('title', 'View Job | '. ucwords($job->title))
@section('css')
<style>
    input{
        border: none !important;
        padding: 20px !important;
        text-align: center
    }
    textarea{
        border: none !important;
       
    }
    label{
        text-align: center !important;
        color: teal !important;
    }
</style>
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
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info p-3">
                        <div class="card-header">
                            <a href="{{ route('job.index') }}" class="btn btn-outline-secondary">View Jobs</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input disabled type="text" class="form-control" value="{{ $job->title }}">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input disabled type="text" class="form-control" value="{{ $job->company }}">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Category</label>
                                            <input disabled type="text" class="form-control" value="{{ $job->category->name }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Job Type</label>
                                            <input type="text" disabled class="form-control"
                                                value="{{ $job->type }}">
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" disabled class="form-control" value="{{ $job->location }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Company Email</label>
                                            <input type="email" disabled class="form-control"  value="{{ $job->email }}">
                                        </div>
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" disabled class="form-control" value="{{ $job->salary }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number_requires">Number of Required Staffs</label>
                                            <input type="text" disabled class="form-control" value="{{ $job->number_requires }}">
                                        </div>
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="skills">Required Skills</label>
                                            <input type="text" disabled class="form-control" value="{{ $job->skills }}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="requirements">Requirements</label>
                                            <textarea disabled class="form-control">{{ $job->requirements }}</textarea>
                                        </div>
                                     
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="others">Other Additional Requirement</label>
                                            <textarea disabled class="form-control">{{ $job->others }}</textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea disabled class="form-control">{{ $job->description }}</textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">
                                            @if(!$job->image)
                                                No <small class="text-secondary">Image</small>
                                            @else
                                            
                                                <img src="{{ asset($job->image) }}" style="width
                                                400px;height:100px" alt="" class="img-fluid img-responsive">
                                            @endif
                                        </label>
                                       
                                    </div>

                                </div>
                                <div class="form-check">
                                    <b>Status :: </b>
                                 <label "form-check-label lead">{{ $job->status ? 'Active' : 'Draft' }}</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                           
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>

    @endsection

    @section('scripts')

    @endsection