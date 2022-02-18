<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if( Auth::user()->role == 'teacher'){
          $rooms = DB::table('rooms')->where('teacher_id', Auth::user()->id)->get();
          return view('teachers.dashboard', ['rooms' => $rooms]);

        }
        else
          return view('students.dashboard');
    }
}
