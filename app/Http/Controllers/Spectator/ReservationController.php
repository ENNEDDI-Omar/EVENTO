<?php

namespace App\Http\Controllers\Spectator;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpectatorReservationStoreRequest;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Pdf;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('spectator.reservation.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */



     public function store(SpectatorReservationStoreRequest $request)
     {
         // Validation rules, adjust as needed
         $data = $request->validated();
     
         $event = Event::findOrFail($data['event_id']);
     
         $reservation = new Reservation([
             'user_id' => auth()->id(),
             'event_id' => $event->id,
             'status' => $event->reservation_type === 'automatique' ? 'accepted' : 'pending',
         ]);
     
         $reservation->save();
     
         if ($reservation->status === 'accepted') {
             $ticketController = new TicketController;
             $ticketController->generateTicket($reservation);
     
             return redirect()->route('home')->with('success', 'Reservation and ticket creation successful');
         } else {
             return redirect()->route('spectator.home.index')->with('success', 'Reservation request submitted successfully. Once your reservation is processed, your ticket will be sent to you.');
         }
     }
     


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('spectator.index', compact('event'));
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

    ///////////
    // public function show(Event $event)
    // {
    //     return view('spectator.events.show', compact('event'));
    // }

    // public function store(ReservationStoreRequest $request, Event $event)
    // {
    //     $user = Auth::user();

    //     // Vérifiez le type de réservation de l'événement
    //     if ($event->reservation_type === 'automatique') {
    //         // Créez une réservation automatique
    //         $reservation = Reservation::create([
    //             'event_id' => $event->id,
    //             'user_id' => $user->id,
    //             // Autres champs de réservation
    //         ]);

    //         // Ajoutez d'autres étapes si nécessaire pour le traitement automatique
    //     } elseif ($event->reservation_type === 'manuel') {
    //         // Créez une demande de réservation en attente de confirmation
    //         $reservationRequest = $user->reservationRequests()->create([
    //             'event_id' => $event->id,
    //             // Autres champs de demande de réservation
    //         ]);

    //         // Ajoutez d'autres étapes si nécessaire pour le traitement manuel
    //     }

    //     return redirect()->route('spectator.events.index')->with('success', 'Reservation request submitted successfully');
    // }
}
