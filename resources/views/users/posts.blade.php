@extends('layouts.app')

@section('title', 'User Posts and Comments')

@section('content')
    <div class="font-bold text-2xl mb-4">Posts by {{ $user->name }}</div>

    <!-- Display user's posts and comments -->
    @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
            <!-- Post content -->
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-sm text-gray-600">{{ $post->content }}</p>
            </div>
            
            <!-- Post images -->
            <div class="grid grid-cols-3 gap-4 p-4">
                @foreach($post->photos as $photo)
                    <img src="{{ asset($photo->file_path) }}" alt="{{ $post->title }}" class="w-32 h-32 object-cover">
                @endforeach
            </div>

            <!-- Comments -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Comments</h3>
                @foreach ($post->comments as $comment)
                <div class="bg-gray-100 p-4 rounded-md mb-4">
                    <p class="text-gray-800">{{ $comment->comment }}</p>
                    <p class="text-gray-600">By: {{ $comment->user->name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <!-- Pagination links -->
    {{ $posts->links() }}
@endsection
