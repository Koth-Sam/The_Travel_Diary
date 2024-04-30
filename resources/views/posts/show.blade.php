
@extends('layouts.app')
@section('title', 'Post Details')
@section('content')
<ul>
    <li class="font-bold"> Post Title : {{$post->title}} </li>
    <li class="font-bold"> Post Content : {{$post->content}} </li>

</ul>


@endsection
