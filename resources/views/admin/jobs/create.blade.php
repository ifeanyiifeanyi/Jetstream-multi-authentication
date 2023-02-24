@extends('admin.layouts.app')

@section('title', 'Create Job')
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary p-3">
                        <div class="card-header">
                            <h3 class="card-title">Create Job</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="post" action="{{ route('jobapp.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                placeholder="Enter Title" value="{{ old('title') }}">
                                        </div>
                                        @error('title')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" name="company" class="form-control" id="company"
                                                placeholder="Enter company" value="{{ old('company') }}">
                                        </div>
                                        @error('company')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <select name="category_id" class="form-control" id="company">
                                                <option value="">Select Job Category</option>
                                                @if($categories->count())
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                                        
                                                    @endforeach
                                                @else
                                                    <option value="0">{{ ('No category') }}</option> 
                                                @endif
                                            </select>
                                        </div>
                                        @error('company')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Job Type</label>
                                            <input type="text" name="type" class="form-control" id="type"
                                                placeholder="Eg. Full time | part time | contract"
                                                value="{{ old('type') }}">
                                        </div>
                                        @error('type')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control" id="location"
                                                placeholder="Enter location" value="{{ old('location') }}">
                                        </div>
                                        @error('location')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Company Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" name="salary" class="form-control" id="salary"
                                                placeholder="Enter salary" value="{{ old('salary') }}">
                                        </div>
                                        @error('salary')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number_requires">Number of Required Staffs</label>
                                            <input type="text" name="number_requires" class="form-control"
                                                id="number_requires" placeholder="number_requires"
                                                value="{{ old('number_requires') }}">
                                        </div>
                                        @error('number_requires')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="skills">Required Skills</label>
                                            <input type="text" name="skills" class="form-control" id="skills"
                                                placeholder="Enter skills" value="{{ old('skills') }}">
                                        </div>
                                        @error('skills')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="requirements">Requirements</label>
                                            <textarea name="requirements" class="form-control" id="requirements"
                                                placeholder="Enter Requirements"
                                                value="{{ old('requirements') }}">{{ old('requirements') }}</textarea>
                                        </div>
                                        @error('requirements')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="others">Other Additional Requirement</label>
                                            <textarea name="others" class="form-control" id="others"
                                                placeholder="Enter others" value="{{ old('others') }}">{{ old('others') }}</textarea>
                                        </div>
                                        @error('others')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control" id="description"
                                                placeholder="Enter description"
                                                value="{{ old('description') }}">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">Image <small
                                                class="text-sm text-secondary">(Optional)</small></label>
                                        <input accept="image/*" type="file" name="image" id="image" class="form-control">
                                        @error('image')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="status" class="form-check-input" id="status">
                                    <label class="form-check-label text-secondary" for="status">(Check to post |
                                        draft)</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" style="width:100% !important" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
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