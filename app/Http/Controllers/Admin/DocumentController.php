<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:2048',
            'updated_date' => 'required|date',
            'is_active' => 'nullable|boolean'
        ]);

        $file = $request->file('file');
        $filePath = $file->store('public/documents');

        Document::create([
            'title' => $request->title,
            'file' => $filePath,
            'type' => Document::getTypeFromExtension($file->getClientOriginalName()),
            'updated_date' => $request->updated_date,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document created successfully.');
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv|max:2048',
            'updated_date' => 'required|date',
            'is_active' => 'nullable|boolean'
        ]);

        $data = [
            'title' => $request->title,
            'updated_date' => $request->updated_date,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($document->file) {
                Storage::delete($document->file);
            }
            
            $file = $request->file('file');
            $data['file'] = $file->store('public/documents');
            $data['type'] = Document::getTypeFromExtension($file->getClientOriginalName());
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        if ($document->file) {
            Storage::delete($document->file);
        }
        
        $document->delete();
        
        return redirect()->route('admin.documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}