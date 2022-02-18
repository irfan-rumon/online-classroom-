<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomController extends Controller
{
    public function create()
    {
        return view('rooms.create', ['teacher_id' => Auth::user()->id ]);
    }

    public function store($teacher_id, Request $request)
    {
        $room = new Room;
        $room->teacher_id = $teacher_id;
        $room->room_name = $request->room_name;
        $room->room_code = $request->room_code;
        $room->save();

        return redirect('/dashboard');
    }
}
