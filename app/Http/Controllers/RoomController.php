<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Assignment;
use App\Models\Post;
use App\Models\Submission;

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

    public function enter( $id )
    {  
        $assignment_questions = DB::table('assignments')->where('room_id', $id)->get('question');
        $posts = DB::table('posts')->where('room_id', $id)->get(['topic', 'contents']);
        $room_name = DB::table('rooms')->where('id', $id)->value('room_name');
    
        if( Auth::user()->role == 'teacher')
            return view('teachers.enter', ['questions' => $assignment_questions,'posts' => $posts, 'room_name' => $room_name, 'id'=>$id] );   
        else if(Auth::user()->role == 'student')
            return view('students.enter', ['question' => $assignment_questions,'posts' => $posts, 'room_name' => $room_name, 'id'=>$id] );    

    }
}