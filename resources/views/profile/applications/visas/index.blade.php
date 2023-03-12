<x-app-layout>
    @section('title', 'Visa Offers')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-800 leading-tight">
            {{ __('Latest Visa Offers') }}
        </h2>
    </x-slot>

    <div class="px-5 py-5">
        <div class="max-w-7xl mx-auto py-10 sm:px-4 lg:px-8">
            <h1 class="mb-10 text-3xl ml-10 mx-auto">Visa Offers</h1>
            <div class="flex flex-wrap -mx-4"> @if($visas->count())
                @foreach ($visas as $visa)
                    <div class="w-full md:w-1/3 px-4 mb-8 sm:overflow-hidden">
                        <div class="bg-white rounded-lg shadow-lg p-5 ">
                            <img src="{{ asset('default/visa.jpg') }}" alt="">
                            <!-- Card content goes here -->
                            <h2 class="text-xl font-bold mb-5 mt-5 text-gray-400">{{ucwords($visa->visa_name)}}</h2>
                            <p class="mb-5 text-gray-500">{{ Str::limit(Str::ucfirst($visa->description)) }}</p>
                            <hr>
                            <p class="flex justify-center mt-5">
                                <a href="{{ route('visa.offers.show', $visa->uuid) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                      <path d="M10 2.5a7.5 7.5 0 0 0-7.5 7.5c0 3.033 1.813 5.604 4.404 6.729L6 18.5v-3.458C3.872 14.403 2.5 12.167 2.5 9.999A7.5 7.5 0 0 1 10 2.5zm4.667 8.556l-.786.787L12 11.048V7.5h-.5a.5.5 0 0 0-.5.5v4.048l-1.88-1.88-.786.787 2.667 2.667a.5.5 0 0 0 .707 0l2.667-2.667z"/>
                                    </svg>
                                    <span>View Details!</span>
                                  </a>
                                  

                            </p>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="flex items-center justify-center">
                        <h3 class="text-orange-600 mx-auto text-4xl">Try again later!</h3>
                    </div>
                @endif




            </div>
        </div>
</x-app-layout>