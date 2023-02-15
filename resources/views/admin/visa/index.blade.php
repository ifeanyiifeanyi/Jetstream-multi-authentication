@extends('admin.layouts.app')

@section('title', 'All Visas template')
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="{{ route('visa.create') }}" class="btn btn-outline-info"><i class="fas fa-plus"></i> Add new</a></h3>
                    <a href="" class="btn btn-warning btn-sm" style="float:right"><i class="fas fa-trash"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px !important"><input type="checkbox" name="ids" id="ids" class="all_ids"></th>
                                <th style="width:20px !important">#</th>
                                <th>Title</th>
                                <th style="width:150px !important">View Details</th>
                                <th style="width:20px !important">Edit</th>
                                <th style="width:20px !important">Delete</th>
                            </tr>
                        </thead>
                        @if($visas->count())
                            <tbody>
                                @foreach ($visas as $visa)
                                <tr>
                                    <td><input type="checkbox" name="ids" id="ids"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($visa->visa_name) }} </td>

                                    <td><a href="{{ route('visa.show', $visa->uuid) }}" class="btn btn-info btn-"><i class="fas fa-eye"></i> View Details</a></td>

                                    <td><a href="{{ route('visa.edit', $visa->uuid) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form id="delete" action="{{ route('visa.destroy', $visa->uuid) }}" method="POST">
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