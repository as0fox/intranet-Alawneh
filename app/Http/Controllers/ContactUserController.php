<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUserController extends Controller
{
    public function search(Request $request)
    {
        try {
            $search = $request->input('query');
            \Log::debug("Searching contacts for: ".$search);
            
            $contacts = Contact::where('is_active', true)
                ->where(function($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('phone', 'like', "%$search%")
                        ->orWhere('department', 'like', "%$search%");
                })
                ->limit(10)
                ->get(['id', 'name', 'email', 'phone', 'department', 'photo']);

            return response()->json($contacts);
            
        } catch (\Exception $e) {
            \Log::error("Contact search failed: " . $e->getMessage());
            return response()->json(['error' => 'Search failed'], 500);
        }
    }
}
