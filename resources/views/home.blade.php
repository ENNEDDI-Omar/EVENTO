<x-app-layout>
    <h1>Home->forAll</h1>
    @foreach ($acceptedEvents as $event)
        <!-- Display event details here -->
        <h2>{{ $event->title }}</h2>
        <p>{{ $event->description }}</p>
        <!-- Add more details as needed -->
    @endforeach

</x-app-layout>
