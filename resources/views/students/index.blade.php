@extends('layouts.app')

@section('title', 'Students Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Students</h1>
            <p class="mt-1 text-sm text-gray-500">{{ count($students ?? []) }} total students</p>
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
                    placeholder="Search students..." 
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
        </div>
    </div>
</div>

<!-- Students Grid -->
<div id="students-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach(($students ?? []) as $index => $student)
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200" 
             data-name="{{ strtolower($student['name']) }}">
            
            <!-- Student Avatar -->
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img
                            src="{{ asset('images/' . $student['image']) }}"
                            alt="{{ $student['name'] }}"
                            class="w-12 h-12 rounded-full object-cover"
                            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&h=48&fit=crop&crop=face';"
                        >
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-medium text-gray-900 truncate">{{ $student['name'] }}</h3>
                        <p class="text-sm text-gray-500">Student #{{ $student['id'] }}</p>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            Age {{ $student['age'] }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card Actions -->
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/students/' . $student['id']) }}" 
                       class="text-sm font-medium text-gray-900 hover:text-gray-700 transition-colors">
                        View details
                    </a>
                    <div class="flex items-center space-x-2">
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
        const grid = document.getElementById('students-grid');
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
            countElement.textContent = `${visibleCards.length} total students`;
        }
    }
</script>
@endsection
