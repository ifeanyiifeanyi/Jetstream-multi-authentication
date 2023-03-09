@extends('admin.layouts.app')

@section('title', 'Manage Users')
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
                    
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px !important"><input type="checkbox" name="ids" id="ids"
                                        class="all_ids"></th>
                                <th style="width:20px !important">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Joined</th>
                                <th style="width:20px !important;text-align:center !important">Verified</th>
                                <th style="width:100px !important">Image</th>
                                <th style="width:20px !important">Delete</th>
                            </tr>
                        </thead>
                        @if($users->count())
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox" name="ids" id="ids"></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($user->name) }} </td>

                                <td>{{ $user->email }}</td>

                                <td> {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                <td>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <i
                                        class="{{ $user->email_verified_at ? 'text-success fas fa-times' : 'text-danger text-center fas fa-times' }}"></i>
                                </td>
                                <td>
                                    @if($user->profile_photo_path)
                                    <a href="{{ asset('storage/'.$user->profile_photo_path) }}" data-toggle="lightbox"
                                        data-title="{{ ucwords($user->name )}}">
                                        <img width="100px" src="{{ asset('storage/'.$user->profile_photo_path) }}"
                                            alt=""><br>
                                            click to view
                                    </a>
                                    @else
                                    <p>No image</p>
                                    @endif
                                </td>
                                <td>
                                    <form id="delete" action="{{ route('delete.user', $user->id) }}" method="POST">
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