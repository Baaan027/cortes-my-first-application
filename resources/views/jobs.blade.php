<x-layout>
    <x-slot name="heading">
        Jobs Page
    </x-slot>

    <ul class="space-y-3">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="block p-4 bg-white rounded-lg shadow-sm hover:shadow-md">
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>