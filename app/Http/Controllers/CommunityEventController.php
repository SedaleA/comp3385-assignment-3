<?php

namespace App\Http\Controllers;

use App\Models\CommunityEvent;
use Illuminate\Http\Request;

class CommunityEventController extends Controller
{
    public function create()
    {
        return view('community-events.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'event_time' => ['required'],
            'venue' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'banner_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $path = null;

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('events', 'public');
        }

        $startsAt = $validated['event_date'] . ' ' . $validated['event_time'];

        CommunityEvent::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'venue' => $validated['venue'],
            'starts_at' => $startsAt,
            'banner_image' => $path,
        ]);

        return redirect('/dashboard')->with('success', 'Event created successfully.');
    }
}