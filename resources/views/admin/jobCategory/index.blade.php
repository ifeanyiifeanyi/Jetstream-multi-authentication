@extends('admin.layouts.app')

@section('title', 'Job Categories')
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
            <div class="row">
                @if(!$category)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Create Category</div>
                        <div class="card-body">

                            <form action="{{ route('category.store') }}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">
                                        <input type="checkbox" name="status" id="status"> Status
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
               @else
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-header">Update Category</div>
                        <div class="card-body">

                            <form action="{{ route('category.update', $category->id) }}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">
                                        <input {{ $category->status ? 'checked' : '' }} type="checkbox" name="status" id="status"> Status
                                    </label>
                                </div>
                                <button type="submit" style="width:100%" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>      
                @endif
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="" class="btn btn-outline-info"><i class="fas fa-plus"></i>
                                    Add new</a></h3>
                            <a href="" class="btn btn-warning btn-sm" style="float:right"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20px !important"><input type="checkbox" name="ids" id="ids"
                                                class="all_ids"></th>
                                        <th>#</th>
                                        <th>Name </th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @if($categories->count())
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td><input type="checkbox" name="ids" id="ids"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucwords($category->name) }} </td>
                                        <td>
                                            @if($category->status)
                                                <p class="text-success">Active</p>
                                            @else
                                            <p class="text-info">Inactive</p>
                                                
                                            @endif
                                        </td>
                                        <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form id="delete" action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                </div>
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