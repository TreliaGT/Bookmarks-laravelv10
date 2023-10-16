<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('bookmark.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Add New Bookmark</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form method="GET" action="{{ route('bookmarks.search') }}" class="mb-4">
                @csrf
                    <div class="flex">
                        <input type="text" name="name" placeholder="Search by name" class="border rounded-l-md p-2">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-md hover:bg-blue-600">Search</button>
                    </div>
                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                   @foreach($bookmarks as $book)
                    <div class="bg-white p-4 rounded shadow-md">
                        <a href="/bookmark/{{$book->slug}}">
                            <div>
                                <img class="w-full h-32 object-cover rounded mb-4" src="{{ asset($book->thumbnail)}}"/>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">{{$book->name}}</h3>
                                <p>  
                                    @if($book->tags)
                                        @foreach($book->tags as $tags)
                                            <a href="/bookmarks/tags/{{$tags->name}}">{{$tags->name}}</a> 
                                        @endforeach
                                    @endif
                                </p>
                                <a href="{{ $book->url }}" class="text-blue-500 hover:underline">The URL Link</a>
                            </div>
                        </a>
                    </div>
                   @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
