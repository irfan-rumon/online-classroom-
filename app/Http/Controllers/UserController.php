<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\StudentsEnrollment;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if( Auth::user()->role == 'teacher'){
          $rooms = DB::table('rooms')->where('teacher_id', Auth::user()->id)->get();
          return view('teachers.dashboard', ['rooms' => $rooms]);

        }
        else{
          //pluck returns array
          $room_ids = DB::table('students_enrollments')->where('student_id', Auth::user()->id)->pluck('room_id');
          
          $rooms = DB::table('rooms')->whereIn('id', $room_ids)->get();
          return view('students.dashboard', ['rooms' => $rooms]);
        }
          
    }

    public function join($id)
    {
       return view('rooms.join', ['student_id' => $id]);
    }
}
