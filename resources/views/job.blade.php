<x-layout>
    <x-slot name="heading">{{ $job->title }}</x-slot>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>
        <h2 class="font-bold text-2xl mt-1">{{ $job->title }}</h2>
        <p class="mt-3">This job pays {{ $job->salary }} per year.</p>

        <div class="mt-4">
            @foreach ($job->tags as $tag)
                <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        <a href="/jobs" class="inline-block mt-4 text-sm text-indigo-600 hover:underline">← Back to jobs</a>
    </div>
</x-layout>
