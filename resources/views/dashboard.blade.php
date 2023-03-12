<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-800 leading-tight">
            Welcome {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-teal-800 px-2 py-2 text-2xl">Welcome, we have some interesting offers for you.</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg shadow-md flex items-center">
                    <div class="text-gray-700 text-3xl font-bold mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor"
                                d="M6.293 15.293a1 1 0 0 1 1.414 0L12 19.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 0-1.414z">
                            </path>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold mb-2">Total Job Applications</h2>
                        <p class="text-gray-700 text-3xl font-bold">{{ $jobApplicationsCount }}</p>
                    </div>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow-md flex items-center">
                    <div class="text-gray-700 text-3xl font-bold mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor"
                                d="M13 9.414V3h-2v6.414l-3.293-3.293-1.414 1.414L12 15.243l5.707-5.707-1.414-1.414L13 9.414zM12 21a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                            </path>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold mb-2">Total Visa Applications</h2>
                        <p class="text-gray-700 text-3xl font-bold">{{ $visaApplicationsCount }}</p>
                    </div>
                </div>
            </div>
            <hr class="mt-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-10">
                @if($jobs->count())
                @foreach ($jobs as $job)
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <img class="rounded-t-lg"
                            src="{{ $job->image ? asset('storage/'.$job->image) : asset('default/hires.jpg') }}"
                            alt="" />
                        <small class="text-teal-400 px-1 py-5">Opening: <b>{{ $job->number_requires }}</b> </small>
                        <h2 class="text-lg font-bold mb-2">Role: {{ $job->title }}</h2>
                        <p class="text-gray-600 mb-4">Company: {{ $job->company }}</p>
                        <p class="text-gray-600 mb-4">Location: {{ ucwords($job->location) }}</p>
                        <p class="text-gray-400 text-sm mb-4">{{\Carbon\Carbon::parse($job->created_at )->diffForHumans()}}</p>
                        <p class="text-green-600 mb-4">Salary: $ {{ $job->salary }}</p>

                    </div>
                @endforeach
                @else
                    <p class="text-red-400 py-5 px-5">Coming Soon</p>
                @endif
            </div>
            <hr class="mt-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-10">
                @if($visas->count())
                @foreach ($visas as $visa)
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <img src="{{ asset('default/visa.jpg') }}" alt="">
                        <h2 class="text-lg font-bold mb-2"><b>Visa</b>: {{ ucwords($visa->visa_name) }}</h2>
                        <p class="text-gray-600 mb-4">Country: {{ ucwords($visa->country) }}</p>
                        <p class="text-gray-400 text-sm mb-4">{{\Carbon\Carbon::parse($visa->created_at )->diffForHumans()}}</p>

                    </div>
                @endforeach
                @else
                    <p class="text-red-400 py-5 px-5">Coming Soon</p>
                @endif
            </div>

        </div>


    </div>
</x-app-layout>