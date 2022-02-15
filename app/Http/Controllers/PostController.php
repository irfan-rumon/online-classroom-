<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->topic = $request->topic;
        $post->contents = $request->contents;
        $post->save();

        return redirect('/dashboard');
    }
}
