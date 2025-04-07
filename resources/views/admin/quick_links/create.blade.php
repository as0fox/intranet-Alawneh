@extends('admin.layouts.app')

@section('title', 'Create Quick Link')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Create Quick Link</h2>
    
    <form method="POST" action="{{ route('admin.quick-links.store') }}">
        @csrf
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                <input id="title" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="title" value="{{ old('title') }}" required />
            </div>
            
            <div>
                <label for="icon" class="block font-medium text-sm text-gray-700">Icon (Font Awesome class)</label>
                <input id="icon" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="icon" value="{{ old('icon') }}" required />
                <p class="mt-1 text-sm text-gray-500">Example: fa-clock, fa-users, etc.</p>
            </div>
            
            <div>
                <label for="url" class="block font-medium text-sm text-gray-700">URL</label>
                <input id="url" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="url" value="{{ old('url') }}" required />
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="color1" class="block font-medium text-sm text-gray-700">Color 1</label>
                    <input id="color1" class="block mt-1 w-full h-10" type="color" name="color1" value="{{ old('color1', '#004e78') }}" required />
                </div>
                
                <div>
                    <label for="color2" class="block font-medium text-sm text-gray-700">Color 2</label>
                    <input id="color2" class="block mt-1 w-full h-10" type="color" name="color2" value="{{ old('color2', '#14A0E9') }}" required />
                </div>
            </div>
            
            <div>
                <label for="order" class="block font-medium text-sm text-gray-700">Order</label>
                <input id="order" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="number" name="order" value="{{ old('order', 0) }}" />
            </div>
            
            <div class="flex items-center">
                <input id="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" {{ old('is_active', true) ? 'checked' : '' }} />
                <label for="is_active" class="ml-2 block font-medium text-sm text-gray-700">Active</label>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.quick-links.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 disabled:opacity-25 transition mr-2">Cancel</a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Create</button>
        </div>
    </form>
</div>
@endsection