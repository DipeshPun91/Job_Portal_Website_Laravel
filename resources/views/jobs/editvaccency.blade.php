<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Job Vaccency') }}
        </h2>
    </x-slot>

    <form action="/edit" method="POST">
        @csrf

        <div class="mt-4">
            <input type="hidden" name="job_id" value="{{ $job->title }}">
        </div>

        <!-- Title -->
        <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $job->title }}" autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Category -->
        <div class="mt-4">
            <x-input-label for="category" :value="__('category')" />
            <select name="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Salary -->
        <div class="mt-4">
            <x-input-label for="salary" :value="__('Salary')" />
            <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" value="{{ $job->salary }}" autofocus autocomplete="salary" />
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </div>

        <!-- Deadline -->
        <div class="mt-4">
            <x-input-label for="deadline" :value="__('Deadline')" />
            <x-text-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" value="{{ $job->deadline->format('Y-m-d') }}" autofocus autocomplete="deadline" />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Vaccency Description')" />
            <textarea id="description" class="block mt-1 w-full" name="description" cols="30" rows="10" autofocus autocomplete="description">{{$job->description}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
