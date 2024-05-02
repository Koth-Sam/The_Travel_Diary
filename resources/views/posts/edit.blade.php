@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    @if ($post->photos->count() > 0)
    <div class="grid grid-cols-3 gap-4">
        @foreach ($post->photos as $photo)
        <img src="{{ asset($photo->file_path) }}" alt="{{ $post->title }}" class="w-full h-32 object-cover">
        @endforeach
    </div>
    @else
    <div class="bg-gray-200 w-full h-64 flex items-center justify-center">
        <span class="text-gray-500">No Image</span>
    </div>
    @endif
    <div class="p-6">
        <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
            @csrf
            <input type="text" id="postTitle" name="title" class="w-full px-3 py-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 mb-4" value="{{ $post->title }}" >
            <textarea id="postContent" name="content" class="w-full px-3 py-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" rows="6" >{{ $post->content }}</textarea>
           
        @auth
        @if(Auth::check() && $post->user_id == Auth::user()->id)
        <button  type="submit"  class="mt-4 bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Save</button>

        @endif
        @else
        
        @endauth

   
    </form>
    </div>
</div>


@endsection
