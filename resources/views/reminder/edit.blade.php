<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Reminder') }}
        </h2>
    </x-slot>

    <form action="/update" method="POST">
        @csrf

        <div class="mt-4">
            <input type="hidden" name="id" value="{{ $reminders->id }}">
        </div>

        <!-- Title -->
        <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $reminders->title }}" autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Completed -->
        <div class="mt-4">
            <x-input-label for="completed" :value="__('completed')" />
            <x-text-input id="completed" class="block mt-1 w-full" type="number" name="completed" value="{{ $reminders->completed }}" autofocus autocomplete="completed" />
            <x-input-error :messages="$errors->get('completed')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
