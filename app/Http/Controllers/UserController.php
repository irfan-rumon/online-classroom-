<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\User;
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
        else if(Auth::user()->role == 'student'){
          //pluck returns array
          $room_ids = DB::table('students_enrollments')->where('student_id', Auth::user()->id)->pluck('room_id');
          
          $rooms = DB::table('rooms')->whereIn('id', $room_ids)->get();
          return view('students.dashboard', ['rooms' => $rooms]);
        }
        else
        {
          return view('admin.dashboard');
        }
          
    }

    public function join($id)
    {
       return view('rooms.join', ['student_id' => $id]);
    }

    public function view_teachers()
    {
      $teachers = DB::table('users')->where('role', 'teacher')->get();
      return view('admin.view_teachers', ['teachers'=>$teachers]);
    }

    public function view_students()
    {
      $students = DB::table('users')->where('role', 'student')->get();
      return view('admin.view_students', ['students' => $students]);
    }

    public function delete_student($id)
    {
        $student = User::find($id);
        $student->delete(); 
        return redirect()->back();
    }

    public function delete_teacher($id)
    {
        $teacher = User::find($id);
        $teacher->delete(); 
        return redirect()->back();
    }
}
