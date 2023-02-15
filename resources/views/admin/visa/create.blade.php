@extends('admin.layouts.app')

@section('title', 'Create Application Template')
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
                    <form action="{{ route('visa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="visa_type" style="float:left !important">Name of Visa</label>
                            <input type="text" name="visa_name" class="form-control" placeholder="Enter name of visa" value="{{ old('visa_name') }}">
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
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="full_name">Full Name:</label>
                                    <input checked type="checkbox" name="full_name" id="full_name" class="form-control" value="full_name">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input checked type="checkbox" name="dob" id="dob" class="form-control" value="dob">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="pob">Place of Birth:</label>
                                    <input checked type="checkbox" name="pob" id="pob" class="form-control" value="pob">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <input checked type="checkbox" name="nationality" id="nationality"
                                        class="form-control" value="nationality">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input checked type="checkbox" name="address" id="address" class="form-control" value="address">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input checked type="checkbox" name="phone" id="phone" class="form-control" value="phone">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input checked type="checkbox" name="email" id="email" class="form-control" value="email">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="purpose_of_travel">Purpose of Travel:</label>
                                    <input type="checkbox" name="purpose_of_travel" id="purpose_of_travel"
                                        class="form-control" value="purpose_of_travel">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="travel_dates">Travel Dates:</label>
                                    <input type="checkbox" data='file' name="travel_dates" id="travel_dates" class="form-control" value="travel_dates">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="itinerary">Itinerary:</label>
                                    <input type="checkbox" name="itinerary" id="itinerary" class="form-control" value="itinerary">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="occupation">Occupation:</label>
                                    <input type="checkbox" name="occupation" id="occupation" class="form-control" value="occupation">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="employer">Employer:</label>
                                    <input type="checkbox" name="employer" id="employer" class="form-control" value="employer">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="salary">Salary:</label>
                                    <input type="checkbox" name="salary" id="salary" class="form-control" value="salary">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="education">Highest Level of Education:</label>
                                    <input type="checkbox" name="education" id="education" class="form-control" value="education">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="education_institution">Name of Educational Institution:</label>
                                    <input type="checkbox" name="education_institution" id="education_institution"
                                        class="form-control" value="education_institution">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="family_name">Family Member Name:</label>
                                    <input type="checkbox" name="family_name" id="family_name" class="form-control" value="family_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="family_relationship">Relationship:</label>
                                    <input type="checkbox" name="family_relationship" id="family_relationship"
                                        class="form-control" value="family_relationship">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="family_dob">Date of Birth:</label>
                                    <input type="checkbox" name="family_dob" id="family_dob" class="form-control" value="family_dob">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="previous_travel">Previous Travel History:</label>
                                    <input type="checkbox" data='file' name="previous_travel" id="previous_travel"
                                        class="form-control" value="previous_travel">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="health_information">Health Information:</label>
                                    <input type="checkbox" data='file' name="health_information" id="health_information"
                                        class="form-control" value="health_information">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="criminal_record">Criminal Record:</label>
                                    <input type="checkbox" data='file' name="criminal_record" id="criminal_record"
                                        class="form-control" value="criminal_record">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="financial_support">Proof of Financial Support:</label>
                                    <input type="checkbox" data="file" name="financial_support" id="financial_support"
                                        class="form-control" value="financial_support">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="university_name">Name of University:</label>
                                    <input type="checkbox" name="university_name" id="university_name"
                                        class="form-control" value="university_name">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="degree_program">Degree Program:</label>
                                    <input type="checkbox" name="degree_program" id="degree_program"
                                        class="form-control" value="degree_progam">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="academic_transcript">Academic Transcript:</label>
                                    <input type="checkbox" data="file" name="academic_transcript"
                                        id="academic_transcript" class="form-control" value="academic_transcript">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="acceptance_letter">University Acceptance Letter:</label>
                                    <input type="checkbox" data="file" name="acceptance_letter" id="acceptance_letter"
                                        class="form-control" value="acceptance_letter">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="destination_country">Destination Country:</label>
                                    <input type="checkbox" name="destination_country" id="destination_country"
                                        class="form-control" value="destination_country">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="duration_of_stay">Duration of Stay:</label>
                                    <input type="checkbox" name="duration_of_stay" id="duration_of_stay"
                                        class="form-control" value="duration_of_stay">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="hotel_reservation">Hotel Reservation:</label>
                                    <input type="checkbox" data='file' name="hotel_reservation" id="hotel_reservation"
                                        class="form-control" name="hotel_reservation">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="job_title">Job Title:</label>
                                    <input type="checkbox" name="job_title" id="job_title" class="form-control" value="job_title">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="employer_name">Employer Name:</label>
                                    <input type="checkbox" name="employer_name" id="employer_name" class="form-control" value="employer_name">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="employer_address">Employer Address:</label>
                                    <input type="checkbox" name="employer_address" id="employer_address"
                                        class="form-control" value="employer_address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <div class="form-group">
                                    <label for="employment_contract">Employment Contract:</label>
                                    <input type="checkbox" data='file' name="employment_contract"
                                        id="employment_contract" class="form-control" value="employment_contract">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                
                                    <div class="form-group">
                                        <label for="passport_number">Passport Number:</label>
                                        <input type="checkbox" data='file' name="passport_number"
                                            id="passport_number" class="form-control" value="passport_number">
                                    </div>
                                
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-3"></div>
                            <div class="col-sm-3 col-md-3 col-xs-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea name="description" class="form-control" id="" style="width:100%" cols="30" rows="10" placeholder="Visa description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                        <label for="status">Status: <span class="text-secondary">Leave unchecked to send to <b>draft</b></span></label>
                        <input type="checkbox" name="status"
                            id="status" class="form-control">
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" style="width: 100%">Save</button>
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