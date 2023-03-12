<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-teal-800 leading-tight">
         Welcome   {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <h3 class="text-teal-800 px-5 py-5 text-2xl">Welcome we interesting offers, for you.</h3>
        </div>
    </div>
</x-app-layout>
