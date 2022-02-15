<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function create()
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $assignment = new Assignmet;
        $assignment->room_code = $request->room_code;
        $assignment->question = $request->question;
        $assignment->save();

        return redirect('/dashboard');
    }
}
