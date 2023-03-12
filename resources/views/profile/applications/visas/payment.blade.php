<x-app-layout>
    @section('title', 'User Visa Application Status')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-teal-800">
            {{ __('Visa Applications') }}
        </h2>
    </x-slot>

    <div class="px-5 py-5">
        <div class="py-10 mx-auto max-w-7xl sm:px-4 lg:px-8">
            <h1 class="mx-auto mb-10 ml-5 text-3xl">Visa Applications</h1>
            <h3 class="mx-auto mb-5 ml-5">Application ID: <strong class="text-gray-500">{{ $visas->uuid}}</strong></h3>

                <div class="grid grid-cols-1 gap-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="p-6 bg-blue-100 rounded-md shadow-md">
                        <h4 class="mb-5">Application Details</h4>

                        <hr>
                        <small class="mb-10 text-blue-500">Application Date: <strong>{{ \Carbon\Carbon::parse($visas->application_date)->diffForHumans() }}</strong> </small>
                        <hr>
                        <p class="mt-10 text-gray-600">Applicant Name: {{ ucwords($visas->user_name) }}</p>
                        <p class="mt-10 text-gray-600">Applicant Email: {{ ucwords($visas->email) }}</p>
                        <p class="mt-10 text-gray-600">Applicant Phone Number: {{ ucwords($visas->phone) }}</p>

                        <p class="mt-10 text-gray-600">Date Of Birth: {{ ucwords($visas->dob) }}</p>
                        <p class="mt-10 text-gray-600">Place Of Birth: {{ ucwords($visas->pob) }}</p>
                        <p class="mt-10 text-gray-600">Nationality: {{ ucwords($visas->nationality) }}</p>

                        <p class="mt-10 text-gray-600">Passport NO: {{ ucwords($visas->passport_number) }}</p>
                        <p class="mt-10 text-gray-600">Visa Type: {{ ucwords($visas->visa_name) }}</p>
                        <p class="mt-10 text-gray-600">Country: {{ ucwords($visas->country) }}</p>
                        <hr>
                        @if ($visas->status === "null" || $visas->status === NULL)

                        <p>
                        <small class="text-red-400">You are expected pay a processing fees amounting to <br><strong class="text-green-500">$ {{ $visas->amount }}</strong></small>
                        </p>
                        <button class="px-4 py-2 font-bold text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                            <span class="inline-flex">
                              <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 016 12H2c0 2.757 1.122 5.26 2.945 7.069l1.414-1.414zm11.293-1.414A7.962 7.962 0 0118 12h-4c0 2.757-1.122 5.26-2.945 7.069l-1.414-1.414z"></path>
                              </svg>
                              <span>Pending</span>
                            </span>
                          </button>

                        @else

                        @endif

                    </div>

                    @if ($visas->status === "null" || $visas->status === NULL)
                        <div class="p-6 rounded-md shadow-md">
                            <div class="grid grid-rows-3 gap-4">
                                <p class="text-gray-500">Due to certain country policies on payment methods, we are only able to accept payments made via cryptocurrency and Perfect Money. We apologize for any inconvenience this may cause and appreciate your understanding in this matter.</p>

                                @if($payment_types->count())
                                    @foreach ($payment_types as $payment_type )
                                    <div class="p-4 text-gray-500 bg-blue-200">
                                        <p>Type: <br> <b>{{ ucwords($payment_type->payment_type) }}</b> </p>
                                        <p>Account Name: <br> <b>{{ ucwords($payment_type->payment_name) }}</b> </p>
                                        <p>Account No. / Wallet ID: <br> <b>{{ ucwords($payment_type->payment_account) }}</b> </p>
                                    </div>
                                    @endforeach
                                @else
                                <div class="p-4 text-white bg-red-400">Payment Not Available for Technical reasons, please try again later.</div>
                                @endif


                            </div>
                        </div>

                        <div class="p-6 bg-gray-100 rounded-md shadow-md">
                            <h4 class="text-blue-400 mb-10">Please Submit prove of Payment</h4>
                            @if($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                                    <strong class="font-bold">Whoops!</strong>
                                    <span class="block sm:inline">There were some problems with your input.</span>
                                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('visa.payment') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="username" id="username"  value="{{ auth()->user()->name }}">

                                <input type="hidden" name="user_email" id="user_email" value="{{ auth()->user()->email }}" >

                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}" >

                                <label for="payment_option" class="">Preferred payment Option:</label>
                                <select name="payment_option_id" id="payment_option_id" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-blue-500 sm:text-sm mb-5" required>
                                    <option>Select Payment Type</option>
                                    @if($payment_types->count())
                                        @foreach ($payment_types as $payment_type )
                                            <option class="text-gray-500" value="{{ $payment_type->id }}">{{ ucwords($payment_type->payment_name) }}</option>
                                        @endforeach
                                    @else
                                        <option>Try again later</option>
                                    @endif
                                </select>



                                <label for="transaction_code" class="">Transaction Code</label>
                                <input type="text" name="transaction_code" id="transaction_code" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-blue-500 sm:text-sm mb-5" value="{{ old('transaction_code') }}" placeholder="Reference code | Transaction Code" required>

                                <label for="prove_of_payment" class="">Prove of payment</label>
                                <input type="file" name="prove_of_payment" id="prove_of_payment" class="w-full border-gray-300 rounded-md focus:ring-green-500 focus:border-blue-500 sm:text-sm" value="{{ old('prove_of_payment') }}" required>
                                <small class="text-red-500 italic">* Only pdf, jpg, jpeg allowed</small>

                                <p class="py-5">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md flex items-center gap-2">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                            <path
                                                d="M10 2.5a7.5 7.5 0 0 0-7.5 7.5c0 3.033 1.813 5.604 4.404 6.729L6 18.5v-3.458C3.872 14.403 2.5 12.167 2.5 9.999A7.5 7.5 0 0 1 10 2.5zm4.667 8.556l-.786.787L12 11.048V7.5h-.5a.5.5 0 0 0-.5.5v4.048l-1.88-1.88-.786.787 2.667 2.667a.5.5 0 0 0 .707 0l2.667-2.667z" />
                                        </svg>

                                        <span>Submit</span>
                                    </button>


                                </p>
                            </form>
                        </div>
                    @endif




                  </div>



        </div>
</x-app-layout>
