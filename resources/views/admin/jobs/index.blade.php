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
                                <th>View Job Details </th>
                                <th>Title </th>
                                <th>Company</th>
                                <th>Category</th>
                                <th>No. of Application</th>
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
                                    <td> <a href="{{ route('job.view', $job->id) }}" class="btn btn-info btn-"><i class="fas fa-eye"></i></a></td>
                                    <td>
                                        {{ ucwords($job->title) }} 
                                       
                                    </td>
                                    <td>{{ ucwords($job->company) }}</td>
                                    <td>{{ ucwords($job->category->name) }}</td>
                                    <td><b>{{ $job->applied_jobs_count }}</b>
                                    </td>
                                    <td><a href="{{ route('job.edit', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form id="delete" action="{{ route('job.destroy', $job->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-transparent border-transparent"><i class="fas fa-trash fa-1x text-danger"></i></button>
                                        </form>
                                    </td>
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