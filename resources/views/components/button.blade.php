@php
$classes = match($type) {
    'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white border-indigo-600',
    'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white border-gray-600',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white border-red-600',
    'success' => 'bg-green-600 hover:bg-green-700 text-white border-green-600',
    'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white border-yellow-600',
    'info' => 'bg-blue-600 hover:bg-blue-700 text-white border-blue-600',
    default => 'bg-gray-600 hover:bg-gray-700 text-white border-gray-600'
};

$sizes = match($size) {
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-6 py-3 text-base',
    'xl' => 'px-8 py-4 text-lg',
    default => 'px-4 py-2 text-sm'
};

$focusRing = match($type) {
    'primary' => 'focus:ring-indigo-500',
    'secondary' => 'focus:ring-gray-500',
    'danger' => 'focus:ring-red-500',
    'success' => 'focus:ring-green-500',
    'warning' => 'focus:ring-yellow-500',
    'info' => 'focus:ring-blue-500',
    default => 'focus:ring-gray-500'
};
@endphp

@if($method === 'GET')
    <a href="{{ $url }}" 
       class="inline-flex items-center {{ $classes }} {{ $sizes }} font-medium rounded-lg border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $focusRing }}"
       @if($confirm) onclick="return confirm('{{ $confirm }}')" @endif>
        @if($icon)
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
        {{ $slot }}
    </a>
@else
    <form action="{{ $url }}" method="{{ $method }}" class="inline">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif
        <button type="submit" 
                class="inline-flex items-center {{ $classes }} {{ $sizes }} font-medium rounded-lg border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $focusRing }}"
                @if($confirm) onclick="return confirm('{{ $confirm }}')" @endif>
            @if($icon)
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $icon !!}
                </svg>
            @endif
            {{ $slot }}
        </button>
    </form>
@endif