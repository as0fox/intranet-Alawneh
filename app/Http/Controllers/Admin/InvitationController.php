<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::latest()->get();
        return view('admin.invitations.index', compact('invitations'));
    }

    public function create()
    {
        return view('admin.invitations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'button_text' => 'required|string|max:50',
            'is_active' => 'nullable|boolean'
        ]);

        Invitation::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'button_text' => $request->button_text,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.invitations.index')
            ->with('success', 'Invitation created successfully.');
    }

    public function edit(Invitation $invitation)
    {
        return view('admin.invitations.edit', compact('invitation'));
    }

    public function update(Request $request, Invitation $invitation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'button_text' => 'required|string|max:50',
            'is_active' => 'nullable|boolean'
        ]);

        $invitation->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'button_text' => $request->button_text,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.invitations.index')
            ->with('success', 'Invitation updated successfully.');
    }

    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        
        return redirect()->route('admin.invitations.index')
            ->with('success', 'Invitation deleted successfully.');
    }
}