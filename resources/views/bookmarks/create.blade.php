<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">Bookmark Information</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form  action="/bookmark/create/new" method="POST">
                        @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                                <input type="text" id="name" name="name" placeholder="Bookmark" value="" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                                <input type="text" id="slug" name="slug" placeholder="bookmark-2"  value="" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="url" class="block text-gray-700 font-semibold mb-2">URL</label>
                                <input type="url" id="url" name="url"  placeholder="https://example.com"  value="" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                                <textarea id="description" name="description"   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500" rows="4"> </textarea>
                            </div>
                            <div class="mb-4">
                                <label for="tags" class="block text-gray-700 font-semibold mb-2">Tags</label>
                               <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500" name="tags" id="tags">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                            <div class="mb-4">
                                <label for="thumbnail" class="block text-gray-700 font-semibold mb-2">Thumbnail</label>
                                <input type="text" id="thumbnail" name="thumbnail" placeholder="image.jpg"  value="" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Create</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
