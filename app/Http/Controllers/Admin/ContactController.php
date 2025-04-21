<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Navigation;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        
        return view('admin.contacts.index', compact('contacts'));
    }
    public function index1()
{
    $ads = [
        (object)[
            'image' => asset('images/ads/ad1.png'),
            'link' => '#',
            'alt_text' => 'Advertisement 1',
            'text' => 'Special Offer: 2% Cashback on All Transactions'
        ],
        (object)[
            'image' => asset('images/ads/ad2.png'),
            'link' => '#',
            'alt_text' => 'Advertisement 2',
            'text' => 'New Mortgage Rates Starting at 3.5%'
        ],
        // Add more ads as needed
      ];
    $navigations = Navigation::where('is_active', true)->orderBy('order')->get();
    $contacts = Contact::orderBy('name')->paginate(20);
    return view('contacts.index', compact('contacts','navigations','ads'));
}

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('photo')) {
            // Generate unique filename and save to public/assets/contacts
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('assets/contacts'), $imageName);
            $data['photo'] = 'assets/contacts/'.$imageName;
        }

        Contact::create($data);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($contact->photo && file_exists(public_path($contact->photo))) {
                unlink(public_path($contact->photo));
            }
            
            // Save new photo
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('assets/contacts'), $imageName);
            $data['photo'] = 'assets/contacts/'.$imageName;
        }

        $contact->update($data);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        // Delete photo file if exists
        if ($contact->photo && file_exists(public_path($contact->photo))) {
            unlink(public_path($contact->photo));
        }
        
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}