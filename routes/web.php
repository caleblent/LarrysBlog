<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $posts = Post::latest();

    if (request('search')) {
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
})->name('home');

// Route::get('/', function (Request $request) {
//     $posts = Post::when($request->search, function ($query, $search) {
//         return $query->where('title', 'like', $search = "%{$search}%")
//             ->orWhere('body', 'like', $search);
//     })->latest()->get();

//     $categories = Category::all();

//     return view('posts', compact('posts', 'categories'));
// })->name('home');




Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category'])
    ]);
});

