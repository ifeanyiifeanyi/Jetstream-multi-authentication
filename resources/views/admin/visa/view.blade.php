@extends('admin.layouts.app')

@section('title', ucwords($visa->visa_name))
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
                  
                        <div class="form-group">
                            <label for="visa_type">Name of Visa</label>
                            <h1 class="text-info">{{ ucwords($visa->visa_name) }}</h1>
                        </div>
                        <hr style="color: teal !important">
                        <div class="container mt-3 mb-3">
                            <h3 class="text-secondary">public & private key,</h3>
                            <h6 class="text-info">Private key: <b>{{ $visa->uuid }}</b></h6>
                            <h6 class="text-info">Public key: <b>{{ $visa->_token }}</b></h6>
                        </div>

                        <div class="row">
                            @foreach($visa as $key => $value)
                            @if($value === NULL || $key === "id" || $key === "uuid" || $key === "_token" || $key === "description")
                                @continue
                            @endif
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="card card-info">
                                    <div class="card-header"><h6>{{ ucwords(Str::replace("_", " ", $key)) }}:</h6></div>
                                    <div class="card-body">
                                        <p>{{ ucwords(Str::replace("_", " ",$value)) }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                             <p class="lead" style="text-align:justify !important">{{ $visa->description }}</p>
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