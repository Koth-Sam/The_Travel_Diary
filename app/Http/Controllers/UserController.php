<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display all posts by a specific user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUserPosts($id)
    {
        // Retrieve the user with their posts
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $user->id)->with('comments')->paginate(10);

        // Pass the data to the view
        return view('users.posts', compact('user', 'posts'));
    }
}
