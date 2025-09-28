<x-layout>
  <x-slot name="heading">Edit Job</x-slot>

  <form method="POST" action="/jobs/{{ $job->id }}" class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
    @csrf
    @method('PATCH')

    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
      <input id="title" name="title" value="{{ old('title', $job->title) }}" required
             class="mt-1 block w-full border rounded px-3 py-2">
      @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
      <input id="salary" name="salary" value="{{ old('salary', $job->salary) }}" required
             class="mt-1 block w-full border rounded px-3 py-2">
      @error('salary') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label for="employer_id" class="block text-sm font-medium text-gray-700">Employer</label>
      <select id="employer_id" name="employer_id" required class="mt-1 block w-full border rounded px-3 py-2">
        @foreach ($employers as $employer)
          <option value="{{ $employer->id }}" {{ (old('employer_id', $job->employer_id) == $employer->id) ? 'selected' : '' }}>
            {{ $employer->name }}
          </option>
        @endforeach
      </select>
      @error('employer_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end gap-2">
      <a href="/jobs/{{ $job->id }}" class="px-4 py-2 border rounded text-gray-700">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button>
    </div>
  </form>

</x-layout>
