<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create($room_id)
    {
        return view('posts.create', ['room_id' => $room_id]);
    }

    public function store($room_id, Request $request)
    {
        $post = new Post;
        $post->room_id = $room_id;
        $post->topic = $request->topic;
        $post->contents = $request->contents;
        $post->save();

        return redirect('/dashboard');
    }
}
