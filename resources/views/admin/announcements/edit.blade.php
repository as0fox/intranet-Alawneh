@extends('admin.layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Edit Announcement</h2>
    
    <form method="POST" action="{{ route('admin.announcements.update', $announcement) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <!-- Title Field -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $announcement->title) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>
            
            <!-- Description Field -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $announcement->description) }}</textarea>
            </div>
            
   <!-- Image Field -->
<div>
    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (Leave empty to keep current image)</label>
    @if($announcement->image)
        <div class="mb-2">
            <img src="{{ asset($announcement->image) }}" alt="Current Image" class="h-32">
        </div>
    @endif
    <input type="file" id="image" name="image"
           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
</div>
            <!-- Button Text Field -->
            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                <input type="text" id="button_text" name="button_text" value="{{ old('button_text', $announcement->button_text) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>
            
            <!-- Button URL Field -->
            <div>
                <label for="button_url" class="block text-sm font-medium text-gray-700 mb-1">Button URL (optional)</label>
                <input type="text" id="button_url" name="button_url" value="{{ old('button_url', $announcement->button_url) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            
            <!-- Active Checkbox -->
            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.announcements.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Announcement
            </button>
        </div>
    </form>
</div>
@endsection