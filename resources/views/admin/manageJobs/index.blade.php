@extends('admin.layouts.app')

@section('title', 'Manage Applied Jobs')
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
            @if(Session::has('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:20px !important"><input type="checkbox" name="ids" id="ids" class="all_ids"></th>
                            <th>#</th>
                            <th>View Application Details </th>
                            <th>Title </th>
                            <th>Company</th>
                            <th>Username</th>
                            <th>User Email</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Application Date</th>
                        </tr>
                    </thead>
                    @if($manageAppliedJobs->count())
                        <tbody>
                            @foreach ($manageAppliedJobs as $job)
                            <tr>
                                <td><input type="checkbox" name="ids" id="ids"></td>
                                <td>{{ $loop->iteration }}</td>
                                <td> <a href="{{ route('manage.appliedjobs.show', $job->job_id) }}" class="btn btn-info btn-"><i class="fas fa-eye"></i></a></td>
                                <td>
                                    {{ ucwords($job->job_title) }} 
                                   
                                </td>
                                <td>{{ ucwords($job->company) }}</td>
                               
                                <td>{{ucwords($job->user_name) }}</td>
                                <td>{{ucwords($job->user_email) }}</td>
                                <td>
                                    @if ($job->job_status == 0)
                                        <p class="text-warning">Pending</p>
                                    @elseif ($job->job_status == 1)
                                        <p class="text-info">Processing</p>
                                    @elseif ($job->job_status == 2)
                                        <p class="text-success">Approved</p>
                                    @else
                                        <p class="text-danger">Loading ...</p>
                                    @endif
                                </td>
                                <td>
                                    <form id="delete" action="{{ route('manage.appliedjobs.destroy', $job->job_token) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-transparent border-transparent"><i class="fas fa-trash fa-1x text-danger"></i></button>
                                    </form>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($job->applied_date)->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    @else
                        <p>No content</p>
                    @endif
                  
                       
                </table>
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
<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).data("id");
            console.log({
                link
            });

            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($("#delete").submit()) {
                        Swal.fire(
                            'Deleted!'
                            , 'Value deleted.'
                            , 'success'
                        )
                    }
                }
            })
        })

    })

</script>
@endsection