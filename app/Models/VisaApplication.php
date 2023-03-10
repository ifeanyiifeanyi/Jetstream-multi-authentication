<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaApplication extends Model
{
    use HasFactory;
    protected $table = 'visa_applications';
    protected $fillable = [
        'visa_applied_name',
        'user_name',
        'user_email',
        'user_id',
        'visa_applied_id',
        'full_name',
        'passport_number',
        'dob',
        'pob',
        'nationality',
        'address',
        'phone',
        'email',
        'purpose_of_travel',
        'travel_dates',
        'itinerary',
        'occupation',
        'employer',
        'salary',
        'education',
        'education_institution',
        'family_name',
        'family_relationship',
        'family_dob',
        'previous_travel',
        'health_information',
        'criminal_record',
        'financial_support',
        'university_name',
        'degree_program',
        'academic_transcript',
        'acceptance_letter',
        'destination_country',
        'duration_of_stay',
        'hotel_reservation',
        'job_title',
        'employer_name',
        'employer_address',
        'employment_contract',
        'status',
        'uuid',
        '_token',
        'amount',
        'country',
        'gender',
        'degree_type',
        'degree_duration',
        'employment_duration'
    ];
}
