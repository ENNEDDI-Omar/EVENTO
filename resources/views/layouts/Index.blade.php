<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTO</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Header - start -->
    <header class="mb-4 flex items-center justify-between py-4 md:py-8">
        <!-- logo - start -->
        <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl"
            aria-label="logo">
            <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M96 0V47L48 94H0V47L48 0H96Z" />
            </svg>
            EVENTO
        </a>
        <!-- logo - end -->

        <!-- nav - start -->
        <nav class="hidden gap-12 lg:flex">
            <a href="#" class="text-lg font-semibold text-indigo-500">Home</a>
            @if (Auth::user()->hasRole('organisator'))
            <a href="{{route('organisator.dashboard.index')}}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">My Dashboard</a>
            @endif
            <a href="#" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">Pricing</a>
            <a href="#" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">About</a>
        </nav>
        <!-- nav - end -->

        <!-- buttons - start -->
        @if (Auth::user()->hasRole('organisator'))
        <a href="{{route('organisator.events.create')}}" class="hidden rounded-lg bg-green-400 px-2 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:inline-block">Create an Event</a>
        @elseif (Auth::user()->hasRole('spectator')) 
        <a href="{{route('organizer_form.create')}}" class="hidden rounded-lg bg-gray-200 px-2 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:inline-block">Became an Organizer!</a>
        @endif
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Logout</button>
        </form>
        <button type="button"
            class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-2.5 py-2 text-sm font-semibold text-gray-500 ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
            Menu
        </button>
        <!-- buttons - end -->
    </header>
    <!-- Header - end -->

    <!-- Content - start -->
    <div class="container mx-auto">
        @yield('content') <!-- Content section to be included in child views -->
    </div>
    <!-- Content - end -->

    <!-- Additional scripts or footers can be included here -->
</body>

</html>
