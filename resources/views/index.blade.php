<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="border-b bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-tight">Students</h1>
            <a href="{{ url('/students/create') }}" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create Student</a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6 flex items-center justify-between gap-4">
            <p class="text-sm text-gray-600">Showing {{ count($students ?? []) }} students</p>
            <div class="relative w-full max-w-xs">
                <input type="text" placeholder="Search by name..." class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" oninput="filterCards(this.value)">
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
            </div>
        </div>

        <div id="students-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach(($students ?? []) as $student)
                <div class="group overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:shadow-md" data-name="{{ strtolower($student['name']) }}">
                    <div class="relative aspect-[4/3] bg-gray-100">
                        <img
                            src="{{ asset('images/' . $student['image']) }}"
                            alt="{{ $student['name'] }}"
                            loading="lazy"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                            onerror="this.onerror=null;this.src='https://via.placeholder.com/600x450?text=Student';"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 right-3 flex items-end justify-between">
                            <h3 class="text-lg font-semibold text-white">{{ $student['name'] }}</h3>
                            <span class="rounded-full bg-white/90 px-2 py-0.5 text-xs font-medium text-gray-800 shadow">Age {{ $student['age'] }}</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <a href="{{ url('/students/' . $student['id']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500">
                                View details
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </a>
                            <span class="text-xs text-gray-500">#{{ $student['id'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <script>
        function filterCards(query) {
            const q = (query || '').toLowerCase().trim();
            const grid = document.getElementById('students-grid');
            const cards = grid.querySelectorAll('[data-name]');
            cards.forEach(card => {
                const name = card.getAttribute('data-name') || '';
                card.style.display = name.includes(q) ? '' : 'none';
            });
        }
    </script>
</body>
</html>


