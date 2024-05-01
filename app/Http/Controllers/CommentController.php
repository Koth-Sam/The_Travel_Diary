<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //Comments Section
        /**
     * Display the specified resource.
     */
    public function store(Request $request, $id)
    {
         // Validate the request data for creating a post
         $validatedData = $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        // Save the post to the database using the create method
        $post = Comment::create([
            'post_id' => $id,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
        ]);

        // Pass the post with its comments to the view
        return back()->with('success', 'Comment added successfully!');    }
}
