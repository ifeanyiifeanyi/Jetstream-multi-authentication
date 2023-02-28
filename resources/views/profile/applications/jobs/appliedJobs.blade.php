<x-app-layout>
    @section('title', 'Latest Jobs')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applied Jobs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <ol class="relative border-l border-gray-600 dark:border-gray-1000">
                @if($jobs->count())
                @foreach($jobs as $job)
                <li class="mb-10 ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>


                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><b>Date Applied:</b> {{ \Carbon\Carbon::parse($job->application_date)->diffForHumans() }}</time> <br>

                    <small class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500"><b>Applicaton Code:</b> {{ $job->job_token }}</small>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><span class="text-purple-500">Title: &nbsp;</span>{{ ucwords($job->title) }}</h3>

                    <h3 class="text-lg text-gray-900 dark:text-white"><span class="text-purple-500">Company: &nbsp;</span>{{ ucwords($job->company) }}</h3>

                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        <b>Description</b> <br>
                        {{ Str::limit($job->description, '400', ' ...') }}
                    </p>
                    <hr>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        
                        <a href="{{ url($job->cv) }}" target="_blank" class="inline-block px-4 py-2 leading-none text-white bg-teal-500 rounded hover:bg-blue-600 mt-4">View Resume</a>
                         <br>
                    </p>
                    <hr>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        <b>Requirement</b> <br>
                        {{ Str::limit($job->requirements, '400', ' ...') }}

                     
                    </p>


                    <a href="{{ route('latest.job.show', $job->id) }}"
                        class="inline-flex items-center px-4 py-2 text-bg font-medium text-white-900 bg-orange-500 border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">{{ $job->job_status ? 'Processing' : 'Pending' }}</a>
                </li>
                @endforeach
                @else
                <li class="mb-10 ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                  
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">You have not applied for any job(s) yet </h3>
                
                </li>
                @endif
               
            </ol>
            {{ $jobs->links() }}

        </div>

    </div>
</x-app-layout>