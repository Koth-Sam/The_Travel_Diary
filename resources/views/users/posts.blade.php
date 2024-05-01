@extends('layouts.app')
@section('title', 'User Posts and Comments')

@section('content')
    <div class="font-bold text-2xl mb-4">Posts and Comments by {{ $user->name }}</div>

    <!-- Display user's posts and comments -->
    @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
            <!-- Post content -->
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-sm text-gray-600">{{ $post->content }}</p>
            </div>

            <!-- Comments -->
            <div class="p-4 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Comments</h3>
                @foreach($post->comments as $comment)
                    <p>{{ $comment->content }}</p>
                @endforeach
            </div>
        </div>
    @endforeach

    <!-- Pagination links -->
    {{ $posts->links() }}
@endsection
