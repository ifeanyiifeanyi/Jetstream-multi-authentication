@extends('admin.layouts.app')

@section('title', 'Edit '. ucwords($visa->visa_name))
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
                    <h3 class="card-title"><a href="{{ route('visa') }}" class="btn btn-outline-info"><i
                                class="fas fa-university"></i> Applications Templates</a></h3>
                </div>
                <div class="card-body text-center">
                    <form action="{{ route('visa.update', $visa->id) }}" method="post">
                        
                        @csrf
                        <div class="form-group">
                            <label for="visa_type" style="float:left !important">Name of Visa</label>
                            <input type="text" name="visa_name" class="form-control" placeholder="Enter name of visa"
                                value="{{ $visa->visa_name }}">
                            @error('visa_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr style="color: teal !important">
                        <div class="container mt-3 mb-3">
                            <h3 class="text-secondary">Check Required Data,</h3>
                            <small class="text-info">Checked values will be required in the user application
                                form</small>
                        </div>
                        <div class="row">
                            @foreach($visa as $key => $value)
                            @if($key === 'uuid' || $key === 'id' || $key === '_token' || $key === 'created_at' || $key
                            === 'updated_at' || $key === 'visa_name' || $key === 'description' || $key === 'status')

                            @continue

                            @endif
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="{{ $key }}">{{Str::replace('_', ' ', ucwords($key)) }}</label>
                                    <input {{ $value !=='null' ? 'checked' : '' }} type="checkbox" name="{{ $key }}"
                                        id="{{ $key }}" class="form-control" value="{{ $value === 'null' ? $key : $value }}">
                                </div>
                               
                            </div>
                            @endforeach

                        </div>
                       


                        <div class="row">
                            <div class="col-12">
                                <textarea name="description" class="form-control" id="" style="width:100%" cols="30"
                                    rows="10" placeholder="Visa description">{{ $visa->description }}</textarea>
                                @error('description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="status">Status: <span class="text-secondary">Leave unchecked to send to
                                    <b>draft</b></span></label>
                            <input {{ $visa->status === 'on' ? 'checked' : '' }} type="checkbox" name="status"
                            id="status" class="form-control">
                        </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" style="width: 100%">update</button>
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