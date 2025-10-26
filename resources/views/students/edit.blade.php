@extends('layouts.app')

@section('title', 'Edit Student - ' . $student->name)

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Student</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update student information</p>
        </div>
        <a href="{{ route('students.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Students
        </a>
    </div>
</div>

<!-- Student Form -->
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Student Information</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update the student details below.</p>
    </div>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="px-6 py-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Student Name <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    value="{{ old('name', $student->name) }}"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('name') border-red-300 @enderror"
                    placeholder="Enter student name"
                    required
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email Address
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    value="{{ old('email', $student->email) }}"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('email') border-red-300 @enderror"
                    placeholder="Enter email address"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-6">
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Grade <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    name="grade" 
                    id="grade"
                    value="{{ old('grade', $student->grade) }}"
                    min="0"
                    max="100"
                    step="0.1"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('grade') border-red-300 @enderror"
                    placeholder="Enter grade (0-100)"
                    required
                >
                @error('grade')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Gender
                </label>
                <select
                    name="gender"
                    id="gender"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('gender') border-red-300 @enderror"
                >
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Course
            </label>
            <div class="flex items-center space-x-4">
                <select
                    name="course_id"
                    id="course_id"
                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('course_id') border-red-300 @enderror"
                >
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Current Image -->
        @if($student->image)
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Current Image
            </label>
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img 
                        src="{{ asset('storage/' . $student->image) }}" 
                        alt="{{ $student->name }}"
                        class="w-24 h-24 object-cover rounded-lg border border-gray-200 dark:border-gray-600"
                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=96&h=96&fit=crop';"
                    >
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <p>Current student image</p>
                    <p class="text-xs">Upload a new image below to replace it</p>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Image Upload -->
        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ $student->image ? 'New Student Image' : 'Student Image' }}
            </label>
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center overflow-hidden">
                        <img id="image-preview" class="w-full h-full object-cover hidden" alt="Preview">
                        <svg id="image-placeholder" class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <input 
                        type="file" 
                        name="image" 
                        id="image"
                        accept="image/*"
                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 @error('image') border-red-300 @enderror"
                        onchange="previewImage(this)"
                    >
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="mt-8 flex items-center justify-end space-x-4">
            <a href="{{ route('students.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                Cancel
            </a>
            <a href="{{ route('students.show', $student->id) }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                View Student
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Update Student
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('image-placeholder');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }
</script>
@endsection
