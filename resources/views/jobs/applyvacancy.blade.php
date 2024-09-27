<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacancy Application') }}
        </h2>
    </x-slot>

    <form action="/application" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="job_id" value="{{ $job_id }}">
        <div class="mt-4">
            <x-input-label for="name" :value="__('Applicant Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" :value="old('name')" name="name" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" :value="old('address')" name="address" autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" :value="old('email')" name="email" autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Contact Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" :value="old('phone')" name="phone" autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="attachments" :value="__('Attachments')" />
            <x-text-input id="attachments" class="block mt-1 w-full" type="file" name="attachments"  autofocus autocomplete="attachments" />
            <x-input-error :messages="$errors->get('attachments')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cover_letter" :value="__('Cover Email')" />
            <textarea id="cover_letter" class="block mt-1 w-full" name="cover_letter" cols="30" rows="10" autofocus autocomplete="cover_letter">{{old('cover_letter')}}</textarea>
            <x-input-error :messages="$errors->get('cover_letter')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Apply') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>