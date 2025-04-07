@extends('admin.layouts.app')

@section('title', 'Documents Management')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 bg-white border-b border-gray-100">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Documents Management</h2>
            <p class="text-sm text-gray-500 mt-1">Manage all documents and files</p>
        </div>
        <a href="{{ route('admin.documents.create') }}" class="btn-primary mt-4 md:mt-0">
            <i class="fas fa-plus-circle mr-2"></i> Add New Document
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Updated</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($documents as $document)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-blue-50 rounded-md flex items-center justify-center mr-3">
                                    <i class="fas fa-file text-blue-400"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $document->title }}</div>
                                    @if($document->description)
                                    <div class="text-sm text-gray-500">{{ Str::limit($document->description, 30) }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 capitalize">
                                {{ $document->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $document->updated_at->format('M d, Y') }}<br>
                            <span class="text-xs text-gray-400">{{ $document->updated_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $document->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $document->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ Storage::url($document->file) }}" download 
                                   class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50"
                                   title="Download">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="{{ route('admin.documents.edit', $document) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 p-1 rounded hover:bg-yellow-50"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50"
                                            onclick="return confirm('Are you sure you want to delete this document?')"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center">
                            <div class="text-gray-400">
                                <i class="fas fa-folder-open fa-2x mb-2"></i>
                                <p class="text-sm font-medium">No documents found</p>
                                <a href="{{ route('admin.documents.create') }}" class="text-blue-500 hover:text-blue-600 text-sm mt-2 inline-block">
                                    Add your first document
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($documents instanceof \Illuminate\Pagination\AbstractPaginator && $documents->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $documents->links() }}
        </div>
    @endif
</div>
@endsection