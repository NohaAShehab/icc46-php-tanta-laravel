@extends('layouts.app')

@section('title', 'Student Details - ' . $student->name)

@section('content')
<!-- Back Button -->
<div class="mb-6">
    <a href="{{ route("students.index")}}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Students
    </a>
</div>

<!-- Student Profile Header -->
<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <div class="px-6 py-8">
        <div class="flex items-start space-x-6">
            <!-- Student Avatar -->
            <div class="flex-shrink-0">
                <img
                    src="{{ Storage::url($student->image)}}"
                    alt="{{ $student->name }}"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg"
                    onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=96&h=96&fit=crop&crop=face';"
                >
            </div>

            <!-- Student Info -->
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $student->name }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Student ID: #{{ $student->id }}</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            Active
                        </span>
                        <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-500">Date of Birth</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $student->date_of_birth }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-500">Age</p>
                                <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($student->date_of_birth)->age }} years</p>
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
                                <p class="text-lg font-semibold text-gray-900">Enrolled</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Student Details -->
<div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
    <!-- Personal Information -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
        </div>
        <div class="px-6 py-4">
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $student->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Student ID</dt>
                    <dd class="mt-1 text-sm text-gray-900">#{{ $student->id }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $student->date_of_birth }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Age</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($student->date_of_birth)->age }} years old</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>
        </div>
        <div class="px-6 py-4">
            <dl class="grid grid-cols-1 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $student->email ?? 'Not provided' }}</dd>
                </div>
                <div>
{{--                    @dump($student->course_id, $student->course)--}}
                    <dt class="text-sm font-medium text-gray-500">Course</dt>

                        @if($student->course)
                        <dd class="mt-1 text-sm "><a href="{{route('courses.show', $student->course_id)}}"> {{$student->course->name}}</a></dd>
                        @else
                        <dd class="mt-1 text-sm text-gray-900"> No course yet</dd>
                        @endif

                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Created by</dt>
                    @dump($student->owner)
                    <dd class="mt-1 text-sm text-gray-900">{{ $student->owner_id ?? 'No owner' }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<!-- Actions -->
<div class="mt-8 flex items-center justify-between">
    <div class="flex items-center space-x-4">
        <a href="{{ url('/students/' . $student->id . '/edit') }}"
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Student
        </a>
        <form action="{{route('students.destroy', $student->id )}}" method="post" >
            @method('delete')
            @csrf
            <button  type="submit" class="inline-flex items-center px-4 py-2 border border-red-300 rounded-lg text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Delete Student
            </button>
        </form>
    </div>

    <div class="text-sm text-gray-500">
        Created at: {{ $student->created_at ? $student->created_at->format('M d, Y \a\t g:i A') : ''}}
    </div>
        <div class="text-sm text-gray-500">
        Last updated: {{ $student->updated_at ? $student->updated_at->format('M d, Y \a\t g:i A') : ''}}
    </div>
</div>
@endsection
