@extends('admin.layouts.app')

@section('title', 'Edit Invitation')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Edit Invitation</h2>
    
    <form method="POST" action="{{ route('admin.invitations.update', $invitation) }}">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                <input id="title" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="title" value="{{ old('title', $invitation->title) }}" required />
            </div>
            
            <div>
                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                <textarea id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="description">{{ old('description', $invitation->description) }}</textarea>
            </div>
            
            <div>
                <label for="icon" class="block font-medium text-sm text-gray-700">Icon (Font Awesome class)</label>
                <input id="icon" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="icon" value="{{ old('icon', $invitation->icon) }}" required />
                <p class="mt-1 text-sm text-gray-500">Example: fa-gift, fa-calendar, etc.</p>
            </div>
            
            <div>
                <label for="button_text" class="block font-medium text-sm text-gray-700">Button Text</label>
                <input id="button_text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="button_text" value="{{ old('button_text', $invitation->button_text) }}" required />
            </div>
            
            <div class="flex items-center">
                <input id="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" {{ old('is_active', $invitation->is_active) ? 'checked' : '' }} />
                <label for="is_active" class="ml-2 block font-medium text-sm text-gray-700">Active</label>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.invitations.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 disabled:opacity-25 transition mr-2">Cancel</a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Update</button>
        </div>
    </form>
</div>
@endsection