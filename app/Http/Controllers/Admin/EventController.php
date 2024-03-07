<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::paginate(10);

        return view('admin.eventss.index', compact('events'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.eventss.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEventStatus(Request $request, Event $event)
    {
        $request->validate([
         'status' => ['required', 'in:accepted,refused'],
        ]);

        $event->update([
            'event_status' => $request->input('status'),
        ]);

        return redirect()->route('administrator.events.index', ['event' => $event->id])->with('success', 'Event accepted successffuly');
    }

    

    
}
