<!-- resources/views/events/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6">Create Event</h2>

        <form action="{{ route('organisator.events.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="poster" class="block text-sm font-medium text-gray-600">Event Poster:</label>
                <input type="file" id="poster" name="poster" accept="image/*"
                    class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 border rounded w-full">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-600">Select Category:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-600">Location:</label>
                <input type="text" id="location" name="location" class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">Date:</label>
                <input type="date" id="date" name="date" class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-600">Capacity:</label>
                <input type="number" id="capacity" name="capacity" class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
                <input type="number" id="price" name="price" class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mt-4">
                <label for="reservation_type" class="block text-sm font-medium text-gray-600">Reservation Type:</label>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="automatic" name="reservation_type" value="automatique"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="automatic" class="ml-2 block text-sm text-gray-900">
                            Automatic
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="manual" name="reservation_type" value="manuel"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="manual" class="ml-2 block text-sm text-gray-900">
                            Manual
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create Event</button>
            </div>

        </form>
    </div>

</body>

</html>
