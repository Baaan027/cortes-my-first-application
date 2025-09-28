<x-layout>
  <x-slot name="heading">Jobs Page</x-slot>

  <div class="max-w-4xl mx-auto space-y-4">
    <div class="flex justify-between items-center">
      <h2 class="text-lg font-semibold">Available Jobs</h2>
      <a href="{{ route('jobs.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">Create Job</a>
    </div>

    <ul class="space-y-4">
      @foreach ($jobs as $job)
        <li class="bg-white p-4 rounded-lg shadow">
          <a href="{{ route('jobs.show', $job) }}" class="block">
            <div class="text-sm text-indigo-600 font-bold">{{ $job->employer->name }}</div>
            <div class="mt-1">
              <strong>{{ $job->title }}</strong>
              <div class="text-sm text-gray-600">Pays {{ $job->salary }} per year.</div>
            </div>
          </a>

          <div class="mt-3">
            @foreach ($job->tags as $tag)
              <span class="inline-block bg-gray-200 text-xs text-gray-700 px-2 py-0.5 rounded-full mr-1">
                {{ $tag->name }}
              </span>
            @endforeach
          </div>
        </li>
      @endforeach
    </ul>

    <div class="mt-6">
      {{ $jobs->links() }}
    </div>
  </div>
</x-layout>
