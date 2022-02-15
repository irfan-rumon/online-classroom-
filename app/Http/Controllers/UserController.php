<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if( Auth::user()->role == 'teacher')
          return view('teachers.dashboard');
        else
          return view('students.dashboard');
    }
}
