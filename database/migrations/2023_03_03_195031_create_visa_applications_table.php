<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->string('visa_applied_name');
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('user_id')->unsigned();
            $table->integer('visa_applied_id')->unsigned();
            $table->string('full_name')->default('null');
            $table->string('passport_number')->default('null');
            $table->string('dob')->default('null');
            $table->string('pob')->default('null');
            $table->string('nationality')->default('null');
            $table->string('address')->default('null');
            $table->string('phone')->default('null');
            $table->string('email')->default('null');
            $table->string('purpose_of_travel')->default('null');
            $table->string('travel_dates')->default('null');
            $table->string('itinerary')->default('null');
            $table->string('occupation')->default('null');
            $table->string('employer')->default('null');
            $table->string('salary')->default('null');
            $table->string('education')->default('null');
            $table->string('education_institution')->default('null');
            $table->string('family_name')->default('null');
            $table->string('family_relationship')->default('null');
            $table->string('family_dob')->default('null');
            $table->string('previous_travel')->default('null');
            $table->string('health_information')->default('null');
            $table->string('criminal_record')->default('null');
            $table->string('financial_support')->default('null');
            $table->string('university_name')->default('null');
            $table->string('degree_program')->default('null');
            $table->string('academic_transcript')->default('null');
            $table->string('acceptance_letter')->default('null');
            $table->string('destination_country')->default('null');
            $table->string('duration_of_stay')->default('null');
            $table->string('hotel_reservation')->default('null');
            $table->string('job_title')->default('null');
            $table->string('employer_name')->default('null');
            $table->string('employer_address')->default('null');
            $table->string('employment_contract')->default('null');
            $table->string('status')->default('null');
            $table->string('uuid')->default('null');
            $table->string('_token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_applications');
    }
};
