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
            $table->tinyInteger('full_name');
            $table->tinyInteger('dob');
            $table->tinyInteger('pob');
            $table->tinyInteger('nationality');
            $table->tinyInteger('address');
            $table->tinyInteger('phone');
            $table->tinyInteger('email');
            $table->tinyInteger('purpose_of_travel')->nullable();
            $table->tinyInteger('travel_dates')->nullable();
            $table->tinyInteger('itinerary');
            $table->tinyInteger('occupation');
            $table->tinyInteger('employer');
            $table->tinyInteger('salary');
            $table->tinyInteger('education');
            $table->tinyInteger('education_institution');
            $table->tinyInteger('family_name');
            $table->tinyInteger('family_relationship');
            $table->tinyInteger('family_dob');
            $table->tinyInteger('previous_travel');
            $table->tinyInteger('health_information');
            $table->tinyInteger('criminal_record');
            $table->tinyInteger('financial_support');
            $table->tinyInteger('university_name');
            $table->tinyInteger('degree_program');
            $table->tinyInteger('academic_transcript');
            $table->tinyInteger('acceptance_letter');
            $table->tinyInteger('destination_country');
            $table->tinyInteger('duration_of_stay');
            $table->tinyInteger('hotel_reservation');
            $table->tinyInteger('job_title');
            $table->tinyInteger('employer_name');
            $table->tinyInteger('employer_address');
            $table->tinyInteger('employment_contract');
            $table->tinyInteger('status');
            $table->tinyInteger('uuid');
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
