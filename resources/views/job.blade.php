<x-layout>
    <x-slot name="heading">
        Job
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="font-bold text-2xl mb-2">{{ $job['title'] }}</h2>
        <p class="text-gray-700 mb-4">This job pays {{ $job['salary'] }} per year.</p>
        <a href="/jobs" class="text-sm text-indigo-600 hover:underline">← Back to jobs</a>
    </div>
</x-layout>
