@props(['active' => false, 'href'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-gray-700 rounded-lg hover:bg-gray-700'
            : 'flex items-center px-4 py-2 mt-2 text-sm font-semibold text-gray-300 hover:bg-gray-700 rounded-lg hover:text-white';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>