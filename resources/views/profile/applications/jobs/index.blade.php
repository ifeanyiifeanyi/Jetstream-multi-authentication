<x-app-layout>
    @section('title', 'Latest Jobs')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest Jobs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl mb-10 text-teal-400 ml-8">Jobs</h1>


            <ol class="relative border-l border-gray-200 dark:border-gray-700">
                @if($jobs->count())
                @foreach($jobs as $job)
                <li class="mb-10 ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ ucwords($job->title) }}</h3>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ Str::limit($job->description, '300', ' ...') }}</p>
                    <a href="{{ route('latest.job.show', $job->id) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn
                        more </a>
                </li>
                @endforeach
                @else
                <li class="mb-10 ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                  
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Coming Soon ...</h3>
                
                </li>
                @endif
               
            </ol>
            {{ $jobs->links() }}

        </div>

    </div>
</x-app-layout>