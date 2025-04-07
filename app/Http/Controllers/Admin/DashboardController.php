<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Leaderboard;
use App\Models\Navigation;
use App\Models\QuickLink;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'announcements' => Announcement::count(),
            'events' => Event::count(),
            'documents' => Document::count(),
            'contacts' => Contact::count(),
            'quickLinks' => QuickLink::count(),
        ];

        $recentEvents = Event::latest()->take(5)->get();
        $recentDocuments = Document::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentEvents', 'recentDocuments'));
    }
}