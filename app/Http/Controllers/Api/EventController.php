<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::where('is_active', true)
            ->whereDate('date', '>=', Carbon::today())
            ->orderBy('date')
            ->get()
            ->map(function ($event) {
                return [
                    'title' => $event->title,
                    'date' => $event->date->format('Y-m-d'),
                    'time' => $event->time,
                    'location' => $event->location,
                ];
            });

        return response()->json($events);
    }
}