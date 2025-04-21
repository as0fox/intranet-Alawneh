@extends('admin.layouts.app')

@section('title', 'Edit Leaderboard Entry')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Edit Leaderboard Entry</h2>
    
    <form method="POST" action="{{ route('admin.leaderboards.update', $leaderboard) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Branch Name</label>
                <input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="name" value="{{ old('name', $leaderboard->name) }}" required />
            </div>
            
            <div>
                <label for="department" class="block font-medium text-sm text-gray-700">Department</label>
                <input id="department" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="department" value="{{ old('department', $leaderboard->department) }}" required />
            </div>
            
            <div>
                <label for="score" class="block font-medium text-sm text-gray-700">Score</label>
                <input id="score" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="number" name="score" value="{{ old('score', $leaderboard->score) }}" required />
            </div>
            
            <div>
                <label for="photo" class="block font-medium text-sm text-gray-700">Photo (Leave empty to keep current photo)</label>
                @if($leaderboard->photo)
                    <div class="mb-2">
                        <img src="{{ ('/'.$leaderboard->photo) }}" alt="Current Photo" class="h-20 rounded-full">
                    </div>
                @endif
                <input id="photo" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" name="photo" />
            </div>
            
            <div class="flex items-center">
                <input id="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" {{ old('is_active', $leaderboard->is_active) ? 'checked' : '' }} />
                <label for="is_active" class="ml-2 block font-medium text-sm text-gray-700">Active</label>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.leaderboards.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 disabled:opacity-25 transition mr-2">Cancel</a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Update</button>
        </div>
    </form>
</div>
@endsection