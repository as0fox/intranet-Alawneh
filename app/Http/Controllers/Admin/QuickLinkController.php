<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuickLink;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    public function index()
    {
        $quickLinks = QuickLink::orderBy('order')->get();
        return view('admin.quick_links.index', compact('quickLinks'));
    }

    public function create()
    {
        return view('admin.quick_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'url' => 'required|string|max:255',
            'color1' => 'required|string|max:7',
            'color2' => 'required|string|max:7',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        QuickLink::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'url' => $request->url,
            'color1' => $request->color1,
            'color2' => $request->color2,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.quick-links.index')
            ->with('success', 'Quick Link created successfully.');
    }

    public function edit(QuickLink $quickLink)
    {
        return view('admin.quick_links.edit', compact('quickLink'));
    }

    public function update(Request $request, QuickLink $quickLink)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'url' => 'required|string|max:255',
            'color1' => 'required|string|max:7',
            'color2' => 'required|string|max:7',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $quickLink->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'url' => $request->url,
            'color1' => $request->color1,
            'color2' => $request->color2,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.quick-links.index')
            ->with('success', 'Quick Link updated successfully.');
    }

    public function destroy(QuickLink $quickLink)
    {
        $quickLink->delete();
        
        return redirect()->route('admin.quick-links.index')
            ->with('success', 'Quick Link deleted successfully.');
    }
}