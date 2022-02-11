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
        return view('rooms.create');
    }

    public function store(Request $request)
    {
       $room = new Room;
       $room->name = $request->name;
       $room->room_code = $request->code;
       $room->teacher_id = Auth::user()->id;
       $room->save();

       return redirect('dashboard/t');
    }

    public function show()
    {
        $classes = DB::table('rooms')->where('teacher_id', Auth::user()->id )->get();
        return view('teachers.showClasses', ['classes'=>$classes]);
    }
}
