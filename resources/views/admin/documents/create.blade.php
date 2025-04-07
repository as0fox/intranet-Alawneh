@extends('admin.layouts.app')

@section('title', 'Create Document')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Create Document</h2>
    
    <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>
            
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File</label>
                <input type="file" id="file" name="file"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                       required>
                <p class="mt-1 text-sm text-gray-500">Supported formats: PDF, Word, Excel</p>
            </div>
            
            <div>
                <label for="updated_date" class="block text-sm font-medium text-gray-700 mb-1">Updated Date</label>
                <input type="date" id="updated_date" name="updated_date" 
                       value="{{ old('updated_date', now()->format('Y-m-d')) }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       required>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.documents.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create
            </button>
        </div>
    </form>
</div>
@endsection