<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vaccancy') }}
        </h2>
    </x-slot>

    <section class="job-details">
        <div class="left-column">
            <img src="/images/feature1.webp" alt="Image" class="company-image">
        </div>
        <div class="right-column">
            <h4 class="company-name">Company Name: {{ $job->user->name }}</h4>
            <h3 class="job-title">Title: {{ $job->title }}</h3>
            <p class="salary">Salary: RS.{{ $job->salary }}/-</p>
            <p class="email">Email: {{ $job->user->email }}</p>
            <p class="category">Category: {{ $job->category->title }}</p>
            <p class="deadline">Deadline: {{ $job->deadline->format('d M Y') }}</p>
            <p class="description">Description: {{ $job->description }}</p>
            <div class="button-container">
                <a href="/apply/{{ $job->id }}" class="apply-button">Apply</a>
                <a href="/jobs" class="back-button">Back</a>
            </div>
        </div>
    </section>
</x-app-layout>
