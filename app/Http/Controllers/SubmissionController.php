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

    

    public function check($assignment_id)
    {
        $submissions = DB::table('submissions')->where('assignment_id', $assignment_id)->get();
        return view('assignments.check', ['submissions' => $submissions]);
    }

    public function myscore($room_id)
    {
        $hw_ids = DB::table('assignments')->where('room_id', $room_id)->pluck('id');
       
        $hws =  DB::table('submissions')->where('student_id', Auth::user()->id)->whereIn('assignment_id', $hw_ids)->get();
        return view('students.hw_score', ['hws'=>$hws]);
    }

    public function answer($id)
    {
        $question = DB::table('assignments')->where('id', $id)->value('question');
        return view('students.answer', ['hw_id' => $id, 'question'=>$question]);
    }

    public function store($hw_id, Request $request)
    {
        $submission = new Submission;
        $submission->assignment_id = $hw_id;
        $submission->assignment_question = $request->question;
        $submission->student_id = Auth::user()->id;
        $submission->answer = $request->answer;
        $submission->score = 0; 
        $submission->save();

        return redirect('/dashboard');
    }

    public function score_store($sheet_id, Request $request)
    {
        $submission = Submission::find($sheet_id);
        
        
        $submission->score = $request->score; 
        $submission->save();

        return redirect('/dashboard');
    }

    public function giveScore($sheet_id)
    {
        $question = DB::table('submissions')->where('id', $sheet_id)->value('assignment_question');  
        $answer = DB::table('submissions')->where('id', $sheet_id)->value('answer'); 
        //echo $sheet;
         return view('teachers.scoring', ['sheet_id'=>$sheet_id, 'question'=>$question, 'answer'=>$answer]);
    }


}
