<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Room;

class PostController extends Controller
{
    public function view($room_id)
    {
      $posts = DB::table('posts')->where('room_id', $room_id)->get(['topic', 'contents']);
      return view('posts.view', ['posts'=>$posts]);
    }

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
