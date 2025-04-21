<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function rsvp(Event $event)
    {
        if (!request()->isMethod('POST')) {
            abort(405, 'Method Not Allowed');
        }

        // Store RSVP in session instead of database
        $rsvps = session()->get('event_rsvps', []);
        
        if (in_array($event->id, $rsvps)) {
            return back()->with('error', 'You have already RSVPed to this event');
        }

        $rsvps[] = $event->id;
        session()->put('event_rsvps', $rsvps);
        
        return back()->with('success', 'Successfully RSVPed to event');
    }

    public function show(Event $event)
    {
        $rsvps = session()->get('event_rsvps', []);
        return view('events.show', [
            'event' => $event,
            'hasRSVPed' => in_array($event->id, $rsvps)
        ]);
    }
}
