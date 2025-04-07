<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboards = Leaderboard::orderByDesc('score')->get();
        return view('admin.leaderboards.index', compact('leaderboards'));
    }

    public function create()
    {
        return view('admin.leaderboards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'score' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'department' => $request->department,
            'score' => $request->score,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('assets/leaderboards'), $imageName);
            $data['photo'] = 'assets/leaderboards/'.$imageName;
        }

        Leaderboard::create($data);

        return redirect()->route('admin.leaderboards.index')
            ->with('success', 'Leaderboard entry created successfully.');
    }

    public function edit(Leaderboard $leaderboard)
    {
        return view('admin.leaderboards.edit', compact('leaderboard'));
    }

    public function update(Request $request, Leaderboard $leaderboard)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'score' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'department' => $request->department,
            'score' => $request->score,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($leaderboard->photo && file_exists(public_path($leaderboard->photo))) {
                unlink(public_path($leaderboard->photo));
            }
            
            // Save new photo
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('assets/leaderboards'), $imageName);
            $data['photo'] = 'assets/leaderboards/'.$imageName;
        }

        $leaderboard->update($data);

        return redirect()->route('admin.leaderboards.index')
            ->with('success', 'Leaderboard entry updated successfully.');
    }

    public function destroy(Leaderboard $leaderboard)
    {
        // Delete photo file if exists
        if ($leaderboard->photo && file_exists(public_path($leaderboard->photo))) {
            unlink(public_path($leaderboard->photo));
        }
        
        $leaderboard->delete();
        
        return redirect()->route('admin.leaderboards.index')
            ->with('success', 'Leaderboard entry deleted successfully.');
    }
}