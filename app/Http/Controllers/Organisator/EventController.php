<?php

namespace App\Http\Controllers\Organisator;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $events = $user->events;

        return view('organisator.dashboard', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('organisator.eventss.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventStoreRequest $request)
    {
        $data = $request->validated();

        $event = Event::create($data);
        $event->addMediaFromRequest('poster')->toMediaCollection('events');

        return redirect()->route('organisator.events.index')->with('success', 'Event created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('organisator.eventss.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('organisator.eventss.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $event->update($request->validated());
        if ($request->hasFile('poster')) {
            $event->clearMediaCollection('events');
            $event->addMediaFromRequest('poster')->toMediaCollection('events');
        }
        return redirect()->route('organisator.events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return view('organisator.eventss.index')->with('success', 'Event deleted successfully');
    }
}
