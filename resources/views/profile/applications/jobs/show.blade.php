<x-app-layout>
    @section('title', ucwords($job->title))
    <x-slot name="header">
        <h2 class="font-semibold text-xl {{ $job->status ? 'text-green-800' : 'text-crimson-800'}} leading-tight">
            {{ $job->status ? 'Avaliable' : 'Position Taken'}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl mb-10 text-teal-400 ml-8">{{ucwords($job->title)}}</h1>

            <div class="flex items-center justify-center">
                <div 
                    class="max-w-sm lg:max-w-3xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-100">

                    <a href="#">
                        <img class="rounded-t-lg"
                            src="{{ $job->image ? asset('storage/'.$job->image) : asset('default/hires.jpg') }}"
                            alt="" />
                    </a>
                    <small class="ml-5 text-sm text-blue-400 text-center">&nbsp;<b>Category </b>|
                        {{ucwords($job->category->name)}} | {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</small><br>

                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ucwords($job->title)}}</h5>
                            <p class="tracking-tight underline">{{ ucwords($job->company) }}</p>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ ucfirst($job->description) }}
                        </p>

                        <hr>
                        <h6 class="mb-5 font-bold tracking-tight text-gray-600 dark:text-white">Requirements And Skills
                        </h6>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ ucfirst($job->requirements) }}
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ ucfirst($job->skills) }}
                        </p>
                        <hr>
                        <h6 class="mb-5 font-bold tracking-tight text-gray-600">Location and Address </h6>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ucwords($job->location)}}
                        </p>
                        <hr>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        <b>Salary :: </b>$ {{ucwords($job->salary)}}.00 per annuan
                        </p>







                        <a href="{{ route('latest.job.apply', $job->id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                             Apply now
                            
                        </a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</x-app-layout>