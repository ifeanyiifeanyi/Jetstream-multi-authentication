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
                  
                        <div class="form-group">
                            <label for="visa_type">Job Title</label>
                            <h4 class="text-info">{{ $viewAppliedJob->title }}</h4>
                        </div>
                        <hr style="color: teal !important">
                        <div class="container mt-3 mb-3">
                            <h3 class="text-secondary text-info">{{ ucwords($viewAppliedJob->company) }}</h3>
                            <h6 class="text-info">Private key: <b>{{ $viewAppliedJob->job_token }}</b></h6>
                            <h6 class="text-info">Application Date: <b>{{ \Carbon\Carbon::parse($viewAppliedJob->applied_date)->diffForHumans() }}</b></h6>
                        </div>

                        <div class="row">
                            @foreach($viewAppliedJob as $value)
                           
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="card card-info">
                                    <div class="card header">

                                    </div>
                                    <div class="card-body">
                                        
                                    </div>
                                    <div class="card-footer">
                                        <p>Salary : <b style="text-success">$ {{ $value->salary }}</b></p>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
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