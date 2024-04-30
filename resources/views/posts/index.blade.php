@extends('layouts.app')
@section('title', 'Post List')
@section('content')

<div class="font-bold text-2xl mb-4">Posts published..</div>


<div class="mb-4">
    <a href="{{ route('posts.create') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-black-600 transition duration-300">
        Create Post
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($posts as $post)
    <a href="/posts/{{$post->id}}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1">
         
            <div class="md:col-span-1 lg:col-span-1">
                <img src="https://placehold.co/600x400" alt="{{ $post->title }}" class="object-cover w-full h-64 md:h-auto">
            </div>
            <!-- Grid item for title and description -->
            <div class="md:col-span-1 lg:col-span-1">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-600">{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>


@endsection
