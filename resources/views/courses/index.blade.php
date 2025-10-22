@extends('layouts.app')

@section('title', 'Courses Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Courses</h1>
            <p class="mt-1 text-sm text-gray-500">{{ count($courses ?? []) }} total courses</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    placeholder="Search courses..."
                    class="block w-64 pl-10 pr-3 py-2 border border-gray-300 rounded-lg text-sm placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900"
                    oninput="filterCards(this.value)"
                >
            </div>
            <button class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                Filter
            </button>
            <a href="{{ route("courses.create") }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Course
            </a>
        </div>
    </div>
</div>

<!-- Courses Grid -->
<div id="courses-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach(($courses ?? []) as $index => $course)
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200"
             data-name="{{ strtolower($course->name) }}">

            <!-- Course Image -->
            <div class="aspect-w-16 aspect-h-9">
                <img
                    src="{{ Storage::url($course->image)}}"
                    alt="{{ $course->name }}"
                    class="w-full h-48 object-cover rounded-t-lg"
                    onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400&h=300&fit=crop';"
                >
            </div>

            <!-- Course Content -->
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $course->name }}</h3>
                        <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ Str::limit($course->description, 100) }}</p>
                    </div>
                </div>

                <!-- Price and Actions -->
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-gray-900">${{ $course->price }}</span>
                        <span class="ml-2 text-sm text-gray-500">USD</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ url('/courses/' . $course->id) }}"
                           class="text-sm font-medium text-gray-900 hover:text-gray-700 transition-colors">
                            View
                        </a>
                        <button class="p-1 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script>
    function filterCards(query) {
        const q = (query || '').toLowerCase().trim();
        const grid = document.getElementById('courses-grid');
        const cards = grid.querySelectorAll('[data-name]');

        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const shouldShow = name.includes(q);
            card.style.display = shouldShow ? '' : 'none';
        });

        // Update results count
        const visibleCards = Array.from(cards).filter(card => card.style.display !== 'none');
        const countElement = document.querySelector('.text-gray-500');
        if (countElement) {
            countElement.textContent = `${visibleCards.length} total courses`;
        }
    }
</script>
@endsection
