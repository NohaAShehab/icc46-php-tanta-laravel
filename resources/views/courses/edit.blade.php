@extends('layouts.app')

@section('title', 'Edit Course - ' . $course->name)

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Edit Course</h1>
            <p class="mt-1 text-sm text-gray-500">Update course information</p>
        </div>
        <a href="{{ url('/courses') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Courses
        </a>
    </div>
</div>

<!-- Course Form -->
<div class="bg-white border border-gray-200 rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Course Information</h3>
        <p class="mt-1 text-sm text-gray-500">Update the course details below.</p>
    </div>
    
    <form action="{{ url('/courses/' . $course->id) }}" method="POST" class="px-6 py-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Course Name <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    value="{{ old('name', $course->name) }}"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900 @error('name') border-red-300 @enderror"
                    placeholder="Enter course name"
                    required
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                    Price (USD) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    name="price" 
                    id="price"
                    value="{{ old('price', $course->price) }}"
                    min="0"
                    step="1"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900 @error('price') border-red-300 @enderror"
                    placeholder="Enter course price"
                    required
                >
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Description -->
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Course Description
            </label>
            <textarea 
                name="description" 
                id="description"
                rows="4"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900 @error('description') border-red-300 @enderror"
                placeholder="Enter course description"
            >{{ old('description', $course->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Current Image -->
        @if($course->image)
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Current Image
            </label>
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img 
                        src="{{ asset('images/' . $course->image) }}" 
                        alt="{{ $course->name }}"
                        class="w-24 h-24 object-cover rounded-lg border border-gray-200"
                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=96&h=96&fit=crop';"
                    >
                </div>
                <div class="text-sm text-gray-500">
                    <p>Current course image</p>
                    <p class="text-xs">Upload a new image below to replace it</p>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Image Upload -->
        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                {{ $course->image ? 'New Course Image' : 'Course Image' }}
            </label>
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img id="image-preview" class="w-full h-full object-cover hidden" alt="Preview">
                        <svg id="image-placeholder" class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <input 
                        type="file" 
                        name="image" 
                        id="image"
                        accept="image/*"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-gray-900 focus:border-gray-900 @error('image') border-red-300 @enderror"
                        onchange="previewImage(this)"
                    >
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="mt-8 flex items-center justify-end space-x-4">
            <a href="{{ url('/courses') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                Cancel
            </a>
            <a href="{{ url('/courses/' . $course->id) }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                View Course
            </a>
            <button 
                type="submit" 
                class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Update Course
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