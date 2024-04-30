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
        <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
        <p class="text-gray-700">{{ $post->content }}</p>
    </div>
</div>
@endsection
