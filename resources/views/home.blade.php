@extends('layouts.app') 
@section('title', 'See Our Posts')
@section('content')



@auth
<div class="mb-4">
    <a href="{{ route('posts.create') }}" class="inline-block px-4 py-2 bg-green-500 text-black rounded-lg hover:bg-black-600 transition duration-300">
        Create Post
    </a>
</div>
@else

@endauth


<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4">
    @foreach($posts as $post)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 bg-white rounded-sm">
            <a href="/posts/{{$post->id}}" >
            <div class="md:col-span-1 lg:col-span-1 h-56">
                @if ($post->photos->isNotEmpty() && !empty($post->photos->first()->file_path))
                    <img src="{{ asset($post->photos->first()->file_path) }}" alt="{{ $post->title }}" class="object-cover w-full h-56 md:h-56">
                @else
                    <img src="https://placehold.co/600x400" alt="{{ $post->title }}" class="object-cover w-full h-56 md:h-56">
                @endif
            </div>
        </a>
            <!-- Grid item for title and description -->
            <div class="md:col-span-1 lg:col-span-1">
                <div class="p-4 h-full flex flex-col justify-between"> <!-- Added h-full class here for default height and flex utilities for spacing -->
                    <a href="/posts/{{$post->id}}" >
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-600">{{ $post->content }}</p>
                    </div>
                </a>
                    <div class="mt-2"> <!-- Added margin top for spacing -->
                        <p class="text-green-600 underline">Posted by <a href= "/users/{{ $post->user->id}}" class="text-green-600 underline">{{ $post->user->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>

{{ $posts->links() }}




@endsection
