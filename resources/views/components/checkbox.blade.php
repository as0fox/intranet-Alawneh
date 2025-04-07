@props(['name', 'checked' => false])

<input type="checkbox" 
       name="{{ $name }}" 
       id="{{ $name }}"
       {{ $checked ? 'checked' : '' }}
       {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500']) }}>