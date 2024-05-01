<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PostController::class, 'index'])->name('posts.home');

Route::get('/users/{id}', [UserController::class, 'getUserPosts'])->name('users.posts');


/*Route::get('/newwelcome', function () {
    return view('newwelcome');
}); */

/*Route::get('/posts/{name}', function ($name=null) {
    return view('post', ['name'=>$name]);
}); */

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('posts.comments.store');

// Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/secret', function()
{return "secret";
})->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
