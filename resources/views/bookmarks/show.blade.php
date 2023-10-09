<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $bookmark->name }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="bg-gray-100 p-4">
                        <ul class="flex tabs">
                            <li class="mr-2">
                            <a href="#" class="bg-white hover:bg-gray-200 rounded-t-lg px-4 py-2 block">Details</a>
                            </li>
                            <li class="mr-2">
                            <a href="#" class="bg-white hover:bg-gray-200 rounded-t-lg px-4 py-2 block">Edit</a>
                            </li>
                        </ul>
                        <div class="bg-white p-4 rounded-b-lg">
                            <!-- Tab 1 content -->
                            <div class="tab-content">
                                    <!-- Flex container with image on the left and information on the right -->
                                    <div class="flex">
                                                <div class="w-1/3 pr-6">
                                                    <!-- Image on the left -->
                                                    <img src="{{ asset($bookmark->thumbnail)}}" alt="Thumbnail" class="w-full max-w-xs mx-auto">
                                                </div>
                                                <div class="w-2/3">
                                                    <!-- Information on the right -->
                                                    <div class="mb-4">
                                                        <label class="block text-gray-700 font-semibold mb-2">URL:</label>
                                                        <a href="{{ $bookmark->url }}" class="text-blue-500 hover:underline"> {{ $bookmark->url }}</a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="block text-gray-700 font-semibold mb-2">Description:</label>
                                                        <p class="text-gray-900">{{$bookmark->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                            <!-- Tab 2 content -->
                            <div class="tab-content hidden">
                                @include('bookmarks.edit')
                            </div>
                        
                            
                        </div>
                        </div>


            
                </div>
            </div>
        </div>
    </div>
    <script>
      
// JavaScript to toggle between tabs
const tabLinks = document.querySelectorAll('.flex.tabs a');
const tabContents = document.querySelectorAll('.tab-content');
document.addEventListener('DOMContentLoaded', function () {
    tabLinks.forEach((link, index) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();

        // Hide all tab contents
        tabContents.forEach((content) => {
        content.classList.add('hidden');
        });
        console.log(index);
        // Show the selected tab content
        tabContents[index].classList.remove('hidden');

        // Remove 'tab-active' class from all links
        tabLinks.forEach((link) => {
        link.classList.remove('tab-active');
        });

        // Add 'tab-active' class to the clicked link
        link.classList.add('tab-active');
    });
    });
});

    </script>
</x-app-layout>
