<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all posts ordered by the created_at timestamp in descending order
        $posts = Post::with('photos')->orderBy('created_at', 'desc')->paginate(10);

        // Pass the ordered posts to the view
        return view('home', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data for creating a post
        $validatedData = $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s]*$/|max:250',
            'content' => 'required|string|max:2000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for images
        ]);

        // Handle image upload and saving to disk
        // Your image upload logic goes here...

        // Save the post to the database using the create method
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);


        // Handle image upload and saving to disk
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
        }

        // Save image paths to the post_image table
        foreach ($imagePaths as $imagePath) {

            $temp = Photo::create([
                'post_id' => $post->id,
                'file_path' => $imagePath,
                'file_name' => $imagePath,
            ]);
        }


        // Flash a success message
        session()->flash('success', 'Post created successfully.');

        // Redirect the user to the index page
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the post with the given ID and eager load its comments
        $post = Post::with(['photos', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc'); // Order comments by created_at in descending order
        }])->findOrFail($id);

        // Pass the post with its comments to the view
        return view('posts.show', ['post' => $post]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Your edit logic goes here...
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Your update logic goes here...
    }


    public function destroy($id)
    {
        // Your destroy logic goes here...
    }
}
