@extends('layouts.app')

@section('title', 'Course Details - ' . $course->name)

@section('content')
<!-- Back Button -->
<div class="mb-6">
    <a href="{{ route("courses.index")}}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Courses
    </a>
</div>

<!-- Course Details -->
<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <!-- Course Image -->
    <div class="w-full max-h-96 flex justify-center bg-gray-100">
        <img
            src="{{ Storage::url($course->image)}}"
            alt="{{ $course->name }}"
            class="max-w-full max-h-full object-contain"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=400&fit=crop';"
        >
    </div>

    <!-- Course Content -->
    <div class="px-6 py-8">
        <div class="flex items-start justify-between">
            <div class="flex-1 min-w-0">
                <h1 class="text-3xl font-bold text-gray-900">{{ $course->name }}</h1>
                <p class="mt-2 text-lg text-gray-600">{{ $course->description }}</p>
            </div>
            <div class="ml-6 flex-shrink-0">
                <div class="text-right">
                    <div class="text-4xl font-bold text-gray-900">${{ $course->price }}</div>
                    <div class="text-sm text-gray-500">USD</div>
                </div>
            </div>
        </div>

        <!-- Course Stats -->
        <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Course Type</p>
                        <p class="text-lg font-semibold text-gray-900">Online</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Created by </p>
                        <p class="text-lg font-semibold text-gray-900">{{$course->creator?  $course->creator->name : "Anonymous"}}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Status</p>
                        <p class="text-lg font-semibold text-gray-900">Available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course Information -->
<div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- Course Details -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Course Information</h3>
        </div>
        <div class="px-6 py-4">
            <dl class="grid grid-cols-1 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Course Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $course->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $course->description }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Price</dt>
                    <dd class="mt-1 text-sm text-gray-900">${{ $course->price }} USD</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Course ID</dt>
                    <dd class="mt-1 text-sm text-gray-900">#{{ $course->id }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Course Actions -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Course Actions</h3>
        </div>
        <div class="px-6 py-4">
            <div class="space-y-4">
    @can('show-course-students', $course)
                <div>
                    <dt class="text-sm font-medium text-gray-500 mb-3">Students in this course ({{ $course->students->count() }})</dt>
                    @if($course->students->count() > 0)
                        <div class="space-y-2">
                            @foreach($course->students as $student)
                                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-3 py-2">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-blue-600">{{ substr($student->name, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $student->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $student->email ?? 'No email' }}</p>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        ID: {{ $student->id }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-500">No students enrolled yet</p>
                        </div>
                    @endif
                </div>
                @else
                    <h5> Only admin or owner can see the students </h5>
                @endcan
                <a href="{{ url('/courses/' . $course->id . '/edit') }}"
                   class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Course
                </a>
                <form action="{{route("courses.destroy", $course->id)}}" method="post">
                    @csrf
                    @method('delete')
                <button  type='submit' class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-300 text-sm font-medium rounded-lg text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Delete Course
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Course Meta Information -->
<div class="mt-8 flex items-center justify-between text-sm text-gray-500">
    <div>
        Created: {{ $course->created_at->format('M d, Y \a\t g:i A') }}
    </div>
    <div>
        Last updated: {{ $course->updated_at->format('M d, Y \a\t g:i A') }}
    </div>
</div>
@endsection
