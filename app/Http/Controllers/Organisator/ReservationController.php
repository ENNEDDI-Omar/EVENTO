<?php

namespace App\Http\Controllers\Organisator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
      
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
