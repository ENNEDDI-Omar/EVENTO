@extends('layouts.Dash')
@section('content')
<div class="flex flex-col items-center mt-8">
    <h1 class="text-3xl font-semibold">{{ $event->title }}</h1>
    <p class="mt-2 text-gray-600">{{ $event->category->name }}</p>
</div>

<div class="mt-8">
    <img src="{{ $event->getFirstMediaUrl('events') }}" alt="Event Poster" class="rounded-lg">
</div>

<div class="mt-8">
    <p class="text-gray-700">{{ $event->description }}</p>
</div>

<div class="mt-8">
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
    <p><strong>Available Seats:</strong> {{ $event->available_seats }}</p>
    <p><strong>Price:</strong> {{ $event->price }}</p>

    @if(is_array($event->reservation_type))
        <p><strong>Reservation Type:</strong> {{ implode(', ', $event->reservation_type) }}</p>
    @else
        <p><strong>Reservation Type:</strong> {{ $event->reservation_type }}</p>
    @endif
</div>
<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Reservations:</h2>

    @if ($reservations->count() > 0)
        <ul class="">
            @foreach ($reservations as $reservation)
                <li class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $reservation->user->name }}</h3>
                    <p>{{ $reservation->user->email }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-red-600">Aucune reservation pour le moment!</p>
    @endif
</div>

<div class="mt-8">
    <a href="{{ route('organisator.events.index') }}" class="text-blue-500 hover:underline">Back to Events</a>
</div>
@endsection