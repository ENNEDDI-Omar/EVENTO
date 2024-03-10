<?php

namespace App\Http\Controllers\Organisator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
      $organiser = Auth::user()->organisator;

    
      $reservations = Reservation::with('event', 'user')
          ->whereHas('event', function ($query) use ($organiser) {
              $query->where('organisator_id', $organiser->id);
          })
          ->get();

      
      $events = $organiser->events;

      return view('organisator.reservations.index', compact('reservations', 'events'));
    }

    public function show(Reservation $reservation)
    {
       return view('organisator.reservations.show', compact('reservation'));
    }

    public function manageReservation(Request $request, Reservation $reservation)
    {
       $request->validate([
        'reservation_status' => ['required', 'in:accepted,refused'],
       ]);
         
       $organisatorDecision = $request->input('reservation_status');
       $reservation->update(['status' => $organisatorDecision,
       ]);

         $message = ($organisatorDecision == 'accepted') ? 'Reservation accepted successffuly' : 'Reservation refused successffuly';  
       return redirect()->route('organisator.reservations.index')->with('success', $message);
    }


}
