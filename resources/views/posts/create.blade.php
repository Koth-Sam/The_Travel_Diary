@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<form method="POST" action="{{route('posts.store')}}">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700">Post Title:</label>
        
        <input type="text" id="title" name="title" class="w-1/2 px-3 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500" value="{{old('title')}}">
    </div>
    <div class="mb-4">
        <label for="content" class="block text-gray-700">Post Content:</label>
        <input type="text" id="content" name="content" class="w-1/2 h-32 px-3 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500" style="line-height: normal;" value="{{old('content')}}">
        
    </div>
    
    <div class="mt-4">
    <input type="submit" valule="Submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 mr-4">
    <a href="{{ route('posts.index')}}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-300"> Cancel</a>
    </div>

</form>


@endsection