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
        <h2 class="text-3xl font-bold mb-2 font-semibold">{{ $post->title }}</h2>
        <p class="text-gray-700">{{ $post->content }}</p>
       
        @auth
        <button id="toggleComment" class="mt-4 bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Add Comment</button>
        @if(Auth::check() && $post->user_id == Auth::user()->id)
        <button id="updatePost" class="mt-4 bg-yellow-500 text-black px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300 float-right">Update</button>
        @endif

        <div id="commentBox" class="hidden mt-4">
            <form action="{{ route('posts.comments.store', ['id' => $post->id]) }}" method="POST" >
                @csrf
                <textarea name="comment" class=" w-full px-3 py-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" rows="4" placeholder="Write your comment here..."></textarea>
                <button type="submit" class="mt-2 bg-green-500 text-black px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Submit</button>
            </form>
        </div>
        @else
        
        @endauth

        @if (session('success'))
    <div id="successAlert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
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
</div>



<script>

        // Add event listener to toggle comment box
        document.getElementById('toggleComment').addEventListener('click', function() {
            document.getElementById('commentBox').classList.toggle('hidden');
        });
        document.getElementById('updatePost').addEventListener('click', function() {
        // Get the post ID from the route
        var postId = "{{ $post->id }}";
        // Construct the URL for the edit page
        var editUrl = "/posts/edit/" + postId;
        // Redirect to the edit page
        window.location.href = editUrl;
    }); 
   
</script>

@endsection





