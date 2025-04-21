<?php
namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Leaderboard;
use App\Models\Navigation;
use App\Models\QuickLink;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
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
          
    
        $settings = SiteSetting::first();
        $navigations = Navigation::where('is_active', true)->orderBy('order')->get();
        $announcements = Announcement::where('is_active', true)->get();
        $quickLinks = QuickLink::where('is_active', true)->orderBy('order')->get();
        $events = Event::where('is_active', true)->orderBy('date')->get();
        $nearestEvents = Event::where('is_active', true)
            ->whereDate('date', '>=', now())
            ->orderBy('date')
            ->take(3)
            ->get();
        $documents = Document::where('is_active', true)->orderBy('updated_date', 'desc')->take(3)->get();
        $contacts = Contact::where('is_active', true)->take(3)->get();
        $leaderboards = Leaderboard::where('is_active', true)->orderBy('score', 'desc')->take(3)->get();
        $invitations = Invitation::where('is_active', true)->get();

        return view('home', compact(
            'settings',
            'navigations',
            'announcements',
            'quickLinks',
            'events',
            'nearestEvents',
            'documents',
            'contacts',
            'leaderboards',
            'ads',
            'invitations'
        ));
    }
}