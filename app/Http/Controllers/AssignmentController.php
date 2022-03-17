<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Assignment;


class AssignmentController extends Controller
{
    public function view($room_id)
    {
        if( Auth::user()->role == 'student')
        {
            $hws = DB::table('assignments')->where('room_id', $room_id)->get(['question', 'id']);
            return view('students.assignments', ['hws'=>$hws]);
        }
        if( Auth::user()->role == 'teacher')
        {
            $hws = DB::table('assignments')->where('room_id', $room_id)->get(['question', 'id']);
            return view('teachers.assignments', ['hws'=>$hws]);
        }

     
      
    }
    public function create($room_id)
    {
        return view('assignments.create', ['room_id' => $room_id]);
    }

    public function store($room_id, Request $request)
    {
        $assignment = new Assignment;
        $assignment->room_id = $room_id;
        $assignment->question = $request->question;
        $assignment->deadline = $request->deadline;
        $assignment->save();

        return redirect('dashboard');
    }
}
