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
                                <p>Due to certain country policies on payment methods, we are only able to accept payments made via cryptocurrency and Perfect Money. We apologize for any inconvenience this may cause and appreciate your understanding in this matter.</p>
                            
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
                        
                        <div class="p-6 bg-yellow-200 rounded-md shadow-md">Box 3</div>
                    @endif
                    
                  


                  </div>



        </div>
</x-app-layout>
