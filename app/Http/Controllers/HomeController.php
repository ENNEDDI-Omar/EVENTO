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
    public function index()
    {
        $user = Auth::user();

        
        $acceptedEvents = Event::paginate(6);

        return view('home', compact( 'acceptedEvents'));
    }

    public function search(Request $request)
    {
        $searchKey = $request->query("searchKey");
        if ($searchKey) {
            $acceptedEvents = Event::where("title", 'LIKE', "%{$searchKey}%")->paginate(1);
        } else {
            $acceptedEvents = Event::where("event_status", "accepted")->paginate(3);
        }
         return view('home', compact('acceptedEvents'));


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
