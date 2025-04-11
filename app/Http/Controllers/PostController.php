<?php

namespace App\Http\Controllers;

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
        $posts = Post::filter(request(['search','category', 'author']))->latest()->paginate(7)->withQueryString();
        return view('posts', [
        'title' => 'Blog Page',
        'posts' => $posts
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('post', [
            'title' => 'Blog Page',
            'post' => $post
        ]);
    }

}
