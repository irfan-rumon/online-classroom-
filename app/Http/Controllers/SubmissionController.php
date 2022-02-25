<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Assignment;

class SubmissionController extends Controller
{
    public function create($assignment_id)
    {
        $question = DB::table('assignments')->where('id', $assignment_id)->value('question');

        return view('submissions.create', ['assignment_id' => $assignment_id,
                                            'question' => $question]);
    }

    public function store($assignment_id, Request $request)
    {
       $submission = new Submission;
       $submission->assignment_id = $assignment_id;
       $submission->student_id = Auth::user()->id;
       $submission->answer = $request->answer;
       $submission->score = 0;

       $submission->save();
       return redirect('/dashboard');
    }

    public function check($assignment_id)
    {
        $submissions = DB::table('submissions')->where('assignment_id', $assignment_id)->get();
        return view('assignments.check', ['submissions' => $submissions]);
    }

    public function myscore($room_id)
    {
        $hw_ids = DB::table('assignments')->where('room_id', $room_id)->pluck('id');
       
        $hw =  DB::table('submissions')->where('student_id', Auth::user()->id)->whereIn('assignment_id', $hw_ids)->get();
        return view('students.hw_score', ['hws'=>$hw]);
    }
}
