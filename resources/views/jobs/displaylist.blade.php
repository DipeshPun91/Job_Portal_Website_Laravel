<x-app-layout>
    <section>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Vaccency') }}
            </h2>
        </x-slot>
        <div class="message">
                <h2>{{ session('message') }}</h2>
        </div>
        <div class="center-container">
            <div class="category-filter">
                <label for="category-select">Categories:</label>
                <form action="/jobs" method="get">
                    <select name="category" id="category-select">
                        <option value="">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <label for="user-select">User:</label>
                    <select name="user" id="user-select">
                        <option value="">None</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Go</button>
                </form>
            </div>
        </div>

        <div class="jobs-list-container">
            <h2>Total Jobs</h2>
            @forelse($jobs as $job)
                <div class="jobs">
                    <div class="job">
                        <img src="" alt="Image" />

                        <h3 class="job-title">{{ $job->title }}</h3>
                        <div class="details">
                            {{ $job->description }}
                        </div>
                        <a href="/job/{{ $job->id }}" class="details-btn">More Details</a>
                        <a href="/destroy/{{ $job->id }}" class="details-btn">Delete</a>
                        <a href="/edit/{{ $job->id }}" class="details-btn">Edit</a>
                        <span class="open-positions">4 open position</span>
                    </div>
                </div>
            @empty
                <div>No Jobs Available.</div>
            @endforelse
        </div>

        {{ $jobs->links() }}
    </section>
</x-app-layout>
