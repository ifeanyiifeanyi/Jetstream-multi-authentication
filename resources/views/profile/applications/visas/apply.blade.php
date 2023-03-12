<x-app-layout>
    @section('title', ucwords($visa_application->visa_name))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-800 leading-tight">
            {{ __('Visa Application Form') }}
        </h2>
    </x-slot>
    <style>

        label{
            margin-bottom: 30px;
        }
    </style>

    <div class="px-5 py-5">
        <div class="max-w-7xl mx-auto py-10 sm:px-4 lg:px-8">
            <h1 class="mb-5 text-3xl ml-10 mx-auto"><span style="color:teal">{{
                    ucwords($visa_application->visa_name) }}</span></h1>
                    <p class="mb-10 text-2xl ml-10 mx-auto">
                        @if ($visa_application->university_name != NULL)
                            {{ ucwords($visa_application->university_name) }}
                        @else
                        {{ ucwords($visa_application->employer_name) }}

                        @endif
                    </p>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">There were some problems with your input.</span>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


            <form action="{{ route('visa.offers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="user_name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="user_email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="visa_applied_name" value="{{ $visa_application->visa_name }}">
                <input type="hidden" name="visa_applied_id" value="{{ $visa_application->id }}">
                <input type="hidden" name="amount" value="{{ $visa_application->amount }}">
                <input type="hidden" name="country" value="{{ $visa_application->country }}">

                <div class="flex flex-wrap -mx-2">
                    @foreach ($visa_application as $key => $visa)
                    @if($visa === NULL || $key !== $visa)
                    @continue
                    @endif
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/2 px-2 mb-2 sm:mb-0 xl:mb-10">
                        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 mb-5 h-full">
                            <label class="flex items-center">

                                <div class="ml-2">
                                    <p class="text-lg font-bold mb-1 sm:mb-2">

                                        @if ($key === 'dob')
                                        <label for="dob" class="">Date of Birth:</label>
                                        <input type="date" name="dob" id="dob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('dob') }}" placeholder="Date of Birth" required>

                                        @elseif ($key === 'full_name')
                                        <label for="full_name" class="">Full Name</label>
                                        <input type="text" name="full_name" id="full_name" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ ucwords(auth()->user()->name) }}" placeholder="Full Name" required>

                                        @elseif ($key === 'email')
                                        <label for="email" class="">Email</label>
                                        <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ auth()->user()->email }}" placeholder="Email" required>

                                        @elseif ($key === 'dob')
                                        <label for="dob" class="">Date of Birth:</label>
                                        <input type="date" name="dob" id="dob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('dob') }}" placeholder="Date of Birth" required>

                                        @elseif ($key === 'pob')
                                        <label for="pob" class="">Place of Birth:</label>
                                        <input type="text" name="pob" id="pob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('pob')}}" placeholder="Place of Birth" required>

                                        @elseif($key === 'travel_dates')
                                        <label for="travel_dates" class="">Travel Dates:</label>
                                        <input type="file" name="travel_dates" id="travel_dates" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('travel_dates')}}" required>
                                        @elseif($key === 'previous_travel')
                                        <label for="previous_travel" class="">Previous travel Dates:</label>
                                        <input type="date" name="previous_travel" id="previous_travel" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('previous_travel')}}" required>

                                        @elseif($key === 'health_information')
                                        <label for="health_information" class="">Health Information:</label>
                                        <input type="file" name="health_information" id="health_information" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('health_information')}}" required>

                                        @elseif($key === 'financial_support')
                                        <label for="financial_support" class="">Financial Information:</label>
                                        <input type="file" name="financial_support" id="financial_support" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('financial_support')}}" required>

                                        @elseif($key === 'academic_transcript')
                                        <label for="academic_transcript" class="">Academic Transcript:</label>
                                        <input type="file" name="academic_transcript" id="academic_transcript" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('academic_transcript')}}" required>

                                        @elseif($key === 'acceptance_letter')
                                        <label for="acceptance_letter" class="">Acceptance Letter:</label>
                                        <input type="file" name="acceptance_letter" id="acceptance_letter" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('acceptance_letter')}}" required>

                                        @elseif($key === 'hotel_reservation')
                                        <label for="hotel_reservation" class="">Hotel Reservation:</label>
                                        <input type="file" name="hotel_reservation" id="hotel_reservation" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('hotel_reservation')}}" required>

                                        @elseif($key === 'criminal_record')
                                        <label for="criminal_record" class="">Any Criminal Record:</label>
                                        <input type="text" name="criminal_record" id="criminal_record" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('criminal_record')}}" required>

                                        @elseif($key === 'employment_contract')
                                        <label for="employment_contract" class="">Employment Contract:</label>
                                        <input type="file" name="employment_contract" id="employment_contract" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('employment_contract')}}" required>

                                        @elseif ($key === 'family_dob')
                                        <label for="family_dob" class="">Place of Birth (Family Member):</label>
                                        <input type="text" name="family_dob" id="family_dob" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('family_dob') }}" placeholder="Place of Birth (Family Member)">
                                        @else
                                        <label for="{{ $key }}" class="">{{ ucwords(Str::replace("_", " ",$key)) }}</label>
                                        <input type="text" name="{{ $key }}" id="{{ $key }}" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old($key) }}" placeholder="{{ ucwords(Str::replace("_", " ",$key)) }}" required>
                                        @endif
                                    </p>
                                </div>
                            </label>
                        </div>

                    </div>

                    @endforeach
                    <hr>

                </div>
                <p class="px-5 py-5">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M10 2.5a7.5 7.5 0 0 0-7.5 7.5c0 3.033 1.813 5.604 4.404 6.729L6 18.5v-3.458C3.872 14.403 2.5 12.167 2.5 9.999A7.5 7.5 0 0 1 10 2.5zm4.667 8.556l-.786.787L12 11.048V7.5h-.5a.5.5 0 0 0-.5.5v4.048l-1.88-1.88-.786.787 2.667 2.667a.5.5 0 0 0 .707 0l2.667-2.667z" />
                        </svg>

                        <span>Apply now!</span>
                    </button>


                </p>
            </form>


        </div>
</x-app-layout>
