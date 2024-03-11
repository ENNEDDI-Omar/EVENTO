<?php

namespace App\Http\Controllers\Organisator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $org_id = Auth::user()->organisator;
        $my_events = Event::where("organisator_id", $org_id)->get();
        $total_events = $my_events->count();
        $eventIds = $my_events->pluck('id')->toArray();
        $total_reservations = Reservation::whereIn("event_id", $eventIds)->count();
        $my_reservations = Reservation::whereIn("event_id", $eventIds)->get();
        return view('organisator.dashboard', compact("total_events", "total_reservations", "my_events", "my_reservations"));
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
    public function show(string $id)
    {
        //
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
