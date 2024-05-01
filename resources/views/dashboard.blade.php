{{-- 
@extends('layouts.app') 
@section('title', 'See Our Posts')
@section('content')

<div class="font-bold text-2xl mb-4">All the Posts Published by Myself..</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($posts as $post)
    <a href="/posts/{{$post->id}}" >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1">
            <div class="md:col-span-1 lg:col-span-1">
                @if ($post->photos->isNotEmpty() && !empty($post->photos->first()->file_path))
                    <img src="{{ asset($post->photos->first()->file_path) }}" alt="{{ $post->title }}" class="object-cover w-full h-64 md:h-auto">
                @else
                    <img src="https://placehold.co/600x400" alt="{{ $post->title }}" class="object-cover w-full h-64 md:h-auto">
                @endif
            </div>
            <!-- Grid item for title and description -->
            <div class="md:col-span-1 lg:col-span-1">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-600">{{ $post->content }}</p>
                    <p class>Posted by <a href="#">{{ $post->user->name }}</a></p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

<!-- Pagination links -->
{{-- <div class="mt-4"> --}}
    {{-- {{ $posts->links() }} --}}
{{-- </div> --}}

@endsection  --}}
