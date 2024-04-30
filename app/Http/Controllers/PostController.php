<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();


        return view('posts.index', ['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
        'title' =>'required|regex:/^[a-zA-Z\s]*$/|max:250',
        'content' => 'required|string|max:2000',
        ]);

        //return response()->json(['Saved Successfully'], 200);
        return response('Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show',['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
