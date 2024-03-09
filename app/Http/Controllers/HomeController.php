<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $searchKey = $request->input("searchKey");

        if ($searchKey) {
            $events = Event::where("title", 'LIKE', "%{$searchKey}%")->paginate(1);
        } else {
            $events = Event::where("event_status", "accepted")->paginate(1);
        }

        $acceptedEvents = Event::where('event_status', 'pending')->paginate(9);
        $categories = Category::all();
        $acceptedReservations = $user->reservations->where('status', 'accepted')->pluck('event_id');

        return view('home', compact('events', 'acceptedEvents', 'acceptedReservations', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $reservations = $event->reservations;
        return view('show', compact('event', 'reservations'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
