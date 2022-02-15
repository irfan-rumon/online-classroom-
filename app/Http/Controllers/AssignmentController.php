<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function create($room_id)
    {
        return view('assignments.create', ['room_id' => $room_id]);
    }

    public function store($room_id, Request $request)
    {
        $assignment = new Assignment;
        $assignment->room_id = $room_id;
        $assignment->question = $request->question;
        $assignment->save();

        return redirect('/dashboard');
    }
}
