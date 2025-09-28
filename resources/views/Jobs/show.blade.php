<x-layout>
  <x-slot name="heading">{{ $job->title }}</x-slot>

  <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>
    <h1 class="text-2xl font-bold mt-1">{{ $job->title }}</h1>
    <p class="mt-3">This job pays {{ $job->salary }} per year.</p>

    <div class="mt-4">
      @foreach ($job->tags as $tag)
        <span class="bg-gray-200 text-xs text-gray-700 px-2 py-0.5 rounded-full mr-1">{{ $tag->name }}</span>
      @endforeach
    </div>

    <div class="mt-6 flex gap-3">
      <a href="/jobs/{{ $job->id }}/edit" class="px-3 py-2 bg-yellow-500 text-white rounded">Edit</a>

      <!-- Delete button triggers hidden DELETE form -->
      <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Delete this job?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded">Delete</button>
      </form>
    </div>

    <a href="/jobs" class="inline-block mt-4 text-sm text-indigo-600 hover:underline">← Back to jobs</a>
  </div>
</x-layout>
