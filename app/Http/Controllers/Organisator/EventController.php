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
        $user = Auth::user()->organisator;
        $myEvents = $user->events()->paginate(6);

        return view('organisator.eventss.index', compact('myEvents'));
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
        //  dd($request->all());
        $data = $request->validated();
        $data['organisator_id'] = Auth::user()->organisator->id;


        $event = Event::create($data);

        $event->addMediaFromRequest('poster')->toMediaCollection('events');

        return redirect()->route('organisator.events.index')->with('success', 'Event created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $reservations = $event->reservations()->get();
        return view('organisator.eventss.show', compact('event', 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organisator.eventss.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $reservationType = $request->input('reservation_type.0', '');

        // Updating the 'reservation_type' field
        $event->update(array_merge($request->validated(), ['reservation_type' => $reservationType]));

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
        return redirect()->route('organisator.events.index')->with('success', 'Event deleted successfully');
    }
}
