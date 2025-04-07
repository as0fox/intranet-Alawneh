<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = Navigation::orderBy('order')->get();
        return view('admin.navigations.index', compact('navigations'));
    }

    public function create()
    {
        return view('admin.navigations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        Navigation::create([
            'title' => $request->title,
            'url' => $request->url,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.navigations.index')->with('success', 'Navigation item created successfully.');
    }

    public function edit(Navigation $navigation)
    {
        return view('admin.navigations.edit', compact('navigation'));
    }

    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $navigation->update([
            'title' => $request->title,
            'url' => $request->url,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.navigations.index')->with('success', 'Navigation item updated successfully.');
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();
        return redirect()->route('admin.navigations.index')->with('success', 'Navigation item deleted successfully.');
    }
}