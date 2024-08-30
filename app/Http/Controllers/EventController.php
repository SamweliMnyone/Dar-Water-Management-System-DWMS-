<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['status' => 'Event deleted']);
    }
}
