
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
<form  action="/bookmark/{{$bookmark->id}}/edit" method="POST">
@csrf 
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
        <input type="text" id="name" name="name" value="{{$bookmark->name}}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
        <input type="text" id="slug" name="slug"  value="{{$bookmark->slug}}"class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="url" class="block text-gray-700 font-semibold mb-2">URL</label>
        <input type="url" id="url" name="url"  value="{{$bookmark->url}}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
        <textarea id="description" name="description" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500" rows="4"> {{$bookmark->description}}</textarea>
    </div>
    <div class="mb-4">
        <label for="tags" class="block text-gray-700 font-semibold mb-2">Tags</label>
        <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500" name="tags" id="tags">
        @if(count($bookmark->tags)  > 1)
            @foreach($bookmark->tags as $tags)
                <option value="Coding" {{$tags->name == "Coding" ?  'selected' : '' }}>Coding</option>
                <option value="Ideas"  {{$tags->name == "Ideas" ?  'selected' : '' }}>Ideas</option>
                <option value="Other"  {{$tags->name == "Other" ?  'selected' : '' }}>Other</option>
            @endforeach
        @else
            <option value="Coding">Coding</option>
            <option value="Ideas">Ideas</option>
            <option value="Other">Other</option>
        @endif
        </select>
    </div>
    <div class="mb-4">
        <label for="thumbnail" class="block text-gray-700 font-semibold mb-2">Thumbnail</label>
        <input type="text" id="thumbnail" name="thumbnail"  value="{{$bookmark->thumbnail}}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
    </div>
    <div class="mt-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Save</button>
    </div>
</form>
             
