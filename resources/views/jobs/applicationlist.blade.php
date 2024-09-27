<x-app-layout>
    <section class="application-list">
    <x-slot name="header">
            <div class="header-content">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Application List') }}
                </h2>

                <form action="/applications" method="get" class="search-form">
                    <input type="text" name="search" class="search-input" placeholder="Search...">
                    <button type="submit" class="search-button">Go</button>
                </form>
            </div>
        </x-slot>
        <div class="message">
            <h2>{{ session('message') }}</h2>
        </div>

        @forelse($applications as $application)
        <div class="application-item">
            <h3 class="applicant-name">Applicant Name: {{ $application->name }}</h3>
            <h3 class="applied-job">Applied Job: {{ $application->job->title }}</h3>
            <p class="address">Address: {{ $application->address }}</p>
            <p class="email">Email: {{ $application->email }}</p>
            <p class="contact-number">Contact Number: {{ $application->phone }}</p>
            <p class="attachment">Attachment: {{ $application->attachments }}</p>
            <p class="cover-email">Cover Email: {{ $application->cover_letter }}</p>
            @if(Auth::check())
                <a href="/destroy_application/{{ $application->id }}" class="delete-button">Delete</a>
                <a href="" class="learn-more-button">Learn More</a>
            @endif
        </div>
        @empty
        <div class="no-application">No Application Available.</div>
        @endforelse

        {{ $applications->links() }}
    </section>
</x-app-layout>
