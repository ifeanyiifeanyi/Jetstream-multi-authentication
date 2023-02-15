@extends('admin.layouts.app')

@section('title', 'All Jobs')
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
                    <h3 class="card-title"><a href="{{ route('job.create') }}" class="btn btn-outline-info"><i class="fas fa-plus"></i> Add new</a></h3>
                    <a href="" class="btn btn-warning btn-sm" style="float:right"><i class="fas fa-trash"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px !important"><input type="checkbox" name="ids" id="ids" class="all_ids"></th>
                                <th>#</th>
                                <th>Title </th>
                                <th>Company</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @if($jobs->count())
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td><input type="checkbox" name="ids" id="ids"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($job->title) }} <a href="{{ route('job.view', $job->id) }}" class="btn btn-info btn-"><i class="fas fa-eye"></i></a></td>
                                    <td>{{ ucwords($job->company) }}</td>
                                    <td><a href="{{ route('job.edit', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
                                    <td>Delete</td>
                                </tr>
                                @endforeach
                            </tbody>
                        @else
                            <p>No content</p>
                        @endif
                      
                           
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection


@section('scripts')
<script>
    document.querySelector('.all_ids').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = this.checked;
        }, this);
    });
</script>
@endsection