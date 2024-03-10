<x-app-layout>
    @vite('resources/css/app.css')
    <div class="flex bg-gray-100 min-h-screen">
        <aside class="hidden sm:flex sm:flex-col">
            <a href="#"
                class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
                <svg fill="none" viewBox="0 0 64 64" class="h-12 w-12">
                    <title>EVENTO</title>
                    <path fill="#fff"
                        d="M48 3H8a5 5 0 00-5 5v48a5 5 0 005 5h40a5 5 0 005-5V8a5 5 0 00-5-5zm0 2a3 3 0 013 3v44a3 3 0 01-3 3H8a3 3 0 01-3-3V8a3 3 0 013-3h40zM16 10v4h4v-4h-4zm8 0v4h4v-4h-4zm8 0v4h4v-4h-4zm8 0v4h4v-4h-4zm0 8v4h4v-4h-4zm-8 0v4h4v-4h-4zm-8 0v4h4v-4h-4zm16 0v4h4v-4h-4zm0 8v4h4v-4h-4zm-16 0v4h4v-4h-4zm8 0v4h4v-4h-4zm8 0v4h4v-4h-4zm-8 0v4h4v-4h-4zm0 8v4h4v-4h-4zm8 0v4h4v-4h-4zm-16 0v4h4v-4h-4zm8 0v4h4v-4h-4z">
                    </path>
                </svg>
            </a>
            <div class="flex-grow flex flex-col justify-between text-gray-500">
                <nav class="flex flex-col mx-4 my-6 space-y-4">

                    <a href="#"
                        class="inline-flex items-center justify-center py-3 text-purple-600 bg-white rounded-lg">
                        <span class="sr-only">Dashboard</span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </a>
                    <a href="{{ route('users.index') }}"
                        class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">Users</span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 2a3 3 0 100 6 3 3 0 000-6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M22 22H2M12.287 7.931a9.002 9.002 0 00-8.83 9.786h17.66a9.002 9.002 0 00-8.83-9.786z" />
                        </svg>

                    </a>
                    <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">Projects</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3a2 2 0 012-2h10a2 2 0 012 2M5 3v18a2 2 0 002 2h10a2 2 0 002-2V3m-2 0h-8v18" />
                        </svg>
                    </a>
                    <a href="{{ route('partners.index') }}" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">Partners</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" clip-rule="evenodd"/>
                        </svg>    
                    </a>
                    <i class="fa-duotone fa-handshake"></i>
                </nav>
                <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
                    <button
                        class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                        <span class="sr-only">Settings</span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </aside>
        <div class="flex-grow text-gray-800">

            <main class="p-6 sm:p-10 space-y-6">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Admin-Dashboard</h1>

                    </div>
                    <div class="flex flex-wrap items-start justify-end -mb-3">
                        <button
                            class="inline-flex px-5 py-3 text-purple-600 hover:text-purple-700 focus:text-purple-700 hover:bg-purple-100 focus:bg-purple-100 border border-purple-600 rounded-md mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Manage dashboard
                        </button>

                    </div>
                </div>
                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">62</span>
                            <span class="block text-gray-500">Artistes</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">6.8</span>
                            <span class="block text-gray-500">Average mark</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold">9</span>
                            <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                            <span class="block text-gray-500">Underperforming Artistes</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">83%</span>
                            <span class="block text-gray-500">Finished projects</span>
                        </div>
                    </div>
                </section>
                <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                    <div class="container mx-auto my-8">
                        <h1 class="text-3xl font-semibold mb-4">Categories</h1>

                        <button x-data="{ showModal: false }" @click="showModal = true"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md mb-4">
                    Create Category
                </button>
        
                {{-- Modal --}}
                <div x-show="showModal" @click.away="showModal = false"
                     class="fixed inset-0 z-50 flex items-center justify-center">
                    <div class="bg-black opacity-50 absolute inset-0"></div>
                    <div class="bg-white p-8 rounded-md shadow-md">
                        {{-- Add your modal content and form for creating a category --}}
                        <h2 class="text-2xl font-semibold mb-4">Create Category</h2>
                        <form action="{{ route('administrator.categories.store') }}" method="post">
                            @csrf
                            <label for="categoryName" class="block text-gray-700">Category Name:</label>
                            <input type="text" id="categoryName" name="name" class="border rounded-md py-1 px-2 mb-4">
        
                            <button type="submit" class="bg-blue-500 text-white py-1 px-4 rounded-md">Create</button>
                        </form>
                    </div>
                </div>
        
                
                        @if (count($categories) > 0)
                            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">Name</th>
                                        <th class="py-2 px-4 border-b">Created At</th>
                                        <th class="py-2 px-4 border-b">Updated At</th>
                                        <th class="py-2 px-4 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                                            <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                            <td class="py-2 px-4 border-b">{{ $category->created_at->format('Y-m-d') }}</td>
                                            <td class="py-2 px-4 border-b">{{ $category->updated_at->format('Y-m-d') }}</td>
                                            <td class="py-2 px-4 border-b">
                                                {{-- Add your actions (e.g., edit, delete) --}}
                                                <a href="{{ route('administrator.categories.edit', $category) }}" class="text-blue-500 hover:underline">Edit</a>
                                                <form action="{{ route('administrator.categories.destroy', $category) }}" method="post" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-600">No categories found.</p>
                        @endif
                    </div>
                </section>
                
            </main>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
</x-app-layout>