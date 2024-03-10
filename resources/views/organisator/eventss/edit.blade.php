@extends('layouts.Dash')
@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <form action="{{ route('organisator.events.update', $event) }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <!-- Organisator ID (hidden input) -->
                <input type="hidden" name="organisator_id" value="{{ Auth::user()->organisator->id }}">

                <!-- Event Poster -->
                <div class="mb-4">
                    <label for="poster" class="block text-gray-700 text-sm font-bold mb-2">Event Poster</label>
                    <input type="file" name="poster" id="poster"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('poster')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                        value="{{ old('title', $event->title) }}">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                    <select name="category_id" id="category_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id', $event->category_id)) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                    <input type="text" name="location" id="location"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('location') border-red-500 @enderror"
                        value="{{ old('location', $event->location) }}" required>
                    @error('location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date -->
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                    <input type="date" name="date" id="date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="{{ old('date', $event->date) }}">
                    @error('date')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Capacity -->
                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity</label>
                    <input type="number" name="capacity" id="capacity"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('capacity') border-red-500 @enderror"
                        value="{{ old('capacity', $event->capacity) }}" required>
                    @error('capacity')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Available Seats -->
                <div class="mb-4">
                    <label for="available_seats" class="block text-gray-700 text-sm font-bold mb-2">Available Seats</label>
                    <input type="number" name="available_seats" id="available_seats"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('available_seats') border-red-500 @enderror"
                        value="{{ old('available_seats', $event->available_seats) }}" required>
                    @error('available_seats')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="number" name="price" id="price"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price') border-red-500 @enderror"
                        value="{{ old('price', $event->price) }}" required>
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reservation Type -->
                <div class="mb-4">
                    <label for="reservation_type" class="block text-gray-700 text-sm font-bold mb-2">Reservation
                        Type</label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="automatic" name="reservation_type[]" value="automatique"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                @if (is_array(old('reservation_type', $event->reservation_type)) &&
                                        in_array('automatique', old('reservation_type', $event->reservation_type))) checked @endif>
                            <label for="automatic" class="ml-2 block text-sm text-gray-900">Automatic</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="manual" name="reservation_type[]" value="manuel"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                @if (is_array(old('reservation_type', $event->reservation_type)) &&
                                        in_array('manuel', old('reservation_type', $event->reservation_type))) checked @endif>
                            <label for="manual" class="ml-2 block text-sm text-gray-900">Manual</label>
                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="flex items-center justify-center gap-3">
                    <button type="submit"
                        class="bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-green-600">
                        Update Event
                    </button>
                    <a href="{{ route('organisator.events.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
