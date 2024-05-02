@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="flex justify-center items-center h-screen bg-gray-100">
    <form method="POST" action="{{ route('posts.store') }}" class="w-full max-w-lg p-6 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Post Title:</label>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500" value="{{ old('title') }}">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700">Post Content:</label>
            <textarea id="content" name="content" class="w-full h-32 px-3 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500">{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="images" class="block text-gray-700">Upload Images:</label>
            <input type="file" id="images" name="images[]" class="w-full border-gray-300 focus:outline-none focus:border-blue-500" accept="image/*" multiple onchange="previewImages(event)">
            <div id="imagePreviews" class="mt-2"></div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-4 py-2  text-green-900 rounded-lg hover:bg-green-600 transition duration-300 mr-4">Submit</button>
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-300">Cancel</a>
        </div>
    </form>


<script>
    function previewImages(event) {
        const imagePreviews = document.getElementById('imagePreviews');
        imagePreviews.innerHTML = '';

        for (let i = 0; i < event.target.files.length; i++) {
            const reader = new FileReader();
            const imageContainer = document.createElement('div');
            const image = document.createElement('img');
            image.classList.add('mt-2');
            image.style.maxWidth = '100%';
            reader.onload = function(e) {
                image.src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[i]);
            imageContainer.appendChild(image);
            imagePreviews.appendChild(imageContainer);
        }
    }
</script>

@endsection
