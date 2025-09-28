<x-layout>
    <x-slot name="heading">Jobs Page</x-slot>

    <ul class="space-y-6">
        @foreach ($jobs as $job)
            <li>
                <div class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <a href="/jobs/{{ $job->id }}" class="block">
                        <div class="font-bold text-indigo-600 text-sm">{{ $job->employer->name }}</div>
                        <div class="mt-1">
                            <strong class="text-lg">{{ $job->title }}</strong>
                            <div class="text-sm text-gray-600">Pays {{ $job->salary }} per year.</div>
                        </div>
                    </a>
                </div>

                <div class="px-4 py-3">
                    @foreach ($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </li>
        @endforeach
        <div class="mt-6">
        {{ $jobs->links() }}
        </div>
    </ul>
</x-layout>