<x-app-layout>
    @section('title', ucwords($visa_application->visa_name))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-800 leading-tight">
            {{ __('Visa Application Form') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-4 lg:px-8">
            <h1 class="mb-10 text-3xl ml-10 mx-auto">Apply for <span style="color:teal">{{
                    ucwords($visa_application->visa_name) }}</span></h1>
            <form action="" me>
                <div class="flex flex-wrap -mx-2">
                    @foreach ($visa_application as $key => $visa)
                    @if($visa === "null" || $key === "id" || $key === "uuid" || $key === "_token" || $key === "description"
                    || $key === 'created_at' || $key === "updated_at" || $key === "visa_name" || $key === "status")
                    @continue
                    @endif
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-2 mb-4 sm:mb-0">
                        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
                            <label class="flex items-center">
                            
                                <div class="ml-2">
                                    <h2 class="text-lg font-bold mb-1 sm:mb-2">
                                        @if ($key === 'dob')
                                        <label for="dob" class="sr-only">Date of Birth:</label>
                                        <input type="date" name="dob" id="dob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('dob') }}" placeholder="Date of Birth">
                                        @elseif ($key === 'pob')

                                        <label for="pob" class="sr-only">Place of Birth:</label>
                                        <input type="date" name="pob" id="pob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('pob')}}" placeholder="Place of Birth">

                                        @elseif($key === 'travel_dates')
                                        <label for="travel_dates" class="sr-only">Travel Dates:</label>
                                        <input type="file" name="travel_dates" id="travel_dates" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('travel_dates')}}">
                                        @elseif($key === 'previous_travel')
                                        <label for="previous_travel" class="sr-only">Previous travel Dates:</label>
                                        <input type="date" name="previous_travel" id="previous_travel" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('previous_travel')}}">

                                        @elseif($key === 'health_information')
                                        <label for="health_information" class="sr-only">Health Information:</label>
                                        <input type="file" name="health_information" id="health_information" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('health_information')}}">

                                        @elseif($key === 'financial_support')
                                        <label for="financial_support" class="sr-only">Financial Information:</label>
                                        <input type="file" name="financial_support" id="financial_support" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('financial_support')}}">
                                        
                                        @elseif($key === 'academic_transcript')
                                        <label for="academic_transcript" class="sr-only">Academic Transcript:</label>
                                        <input type="file" name="academic_transcript" id="academic_transcript" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('academic_transcript')}}">

                                        @elseif($key === 'acceptance_letter')
                                        <label for="acceptance_letter" class="sr-only">Acceptance Letter:</label>
                                        <input type="file" name="acceptance_letter" id="acceptance_letter" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('acceptance_letter')}}">

                                        @elseif($key === 'hotel_reservation')
                                        <label for="hotel_reservation" class="sr-only">Hotel Reservation:</label>
                                        <input type="file" name="hotel_reservation" id="hotel_reservation" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('hotel_reservation')}}">

                                        @elseif($key === 'employment_contract')
                                        <label for="employment_contract" class="sr-only">Employment Contract:</label>
                                        <input type="file" name="employment_contract" id="employment_contract" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('employment_contract')}}">

                                        @elseif ($key === 'family_dob')
                                        <label for="family_dob" class="sr-only">Place of Birth (Family Member):</label>
                                        <input type="text" name="family_dob" id="family_dob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('family_dob') }}" placeholder="Place of Birth (Family Member)">
                                        @else
                                        <label for="{{ $key }}" class="sr-only">{{ ucwords(Str::replace("_", " ",$key)) }}</label>
                                        <input type="text" name="{{ $key }}" id="{{ $key }}" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old($key) }}" placeholder="{{ ucwords(Str::replace("_", " ",$key)) }}">
                                        @endif
                                    </h2>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    @endforeach
                    <hr>
                    <p class="px-5 py-5 w-10/12">
                        <a href=""
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                <path
                                    d="M10 2.5a7.5 7.5 0 0 0-7.5 7.5c0 3.033 1.813 5.604 4.404 6.729L6 18.5v-3.458C3.872 14.403 2.5 12.167 2.5 9.999A7.5 7.5 0 0 1 10 2.5zm4.667 8.556l-.786.787L12 11.048V7.5h-.5a.5.5 0 0 0-.5.5v4.048l-1.88-1.88-.786.787 2.667 2.667a.5.5 0 0 0 .707 0l2.667-2.667z" />
                            </svg>
                            <span>Apply now!</span>
                        </a>


                    </p>
                </div>
            </form>


        </div>
</x-app-layout>