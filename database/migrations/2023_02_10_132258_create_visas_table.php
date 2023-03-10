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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_name');
            $table->string('full_name')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('purpose_of_travel')->nullable();
            $table->string('travel_dates')->nullable();
            $table->string('itinerary')->nullable();
            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('salary')->nullable();
            $table->string('education')->nullable();
            $table->string('education_institution')->nullable();
            $table->string('family_name')->nullable();
            $table->string('family_relationship')->nullable();
            $table->string('family_dob')->nullable();
            $table->string('previous_travel')->nullable();
            $table->string('health_information')->nullable();
            $table->string('criminal_record')->nullable();
            $table->string('financial_support')->nullable();
            $table->string('university_name')->nullable();
            $table->string('degree_program')->nullable();
            $table->string('academic_transcript')->nullable();
            $table->string('acceptance_letter')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('duration_of_stay')->nullable();
            $table->string('hotel_reservation')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employment_contract')->nullable();
            $table->string('status')->nullable();
            $table->string('uuid')->nullable();
            $table->string('_token');
            $table->text('description');
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
        Schema::dropIfExists('visas');
    }
};
