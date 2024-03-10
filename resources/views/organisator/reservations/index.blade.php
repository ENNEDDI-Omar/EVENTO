@extends('layouts.Dash')
@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">Reservations for Your Events</h1>

    @if (count($reservations) > 0)
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Event</th>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $reservation->event->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="py-2 px-4 border-b">{{ ucfirst($reservation->status) }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('organisator.reservations.manage', $reservation) }}" method="post">
                                @csrf
                                @method('put')
                                <select name="reservation_status" class="border rounded-md py-1 px-2">
                                    <option value="accepted" {{ $reservation->status == 'accepted' ? 'selected' : '' }}>Accept</option>
                                    <option value="refused" {{ $reservation->status == 'refused' ? 'selected' : '' }}>Refuse</option>
                                </select>
                                <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded-md ml-2">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No reservations found.</p>
    @endif
</div>
@endsection