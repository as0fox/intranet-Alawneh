<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function publicIndex()
    {
        $documents = Document::where('is_public', true)->latest()->get();
        return view('documents.index', compact('documents'));
    }
}
