<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_update = false;

        $questions = Question::all();

        $exams = Exam::all();

        return view('admin.manage_question', compact('is_update', 'questions', 'exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create([
            'question_number'=>$request->question_number,
            'question_text'=>$request->question_text,
            'question_points'=>$request->question_points,
            'option_one'=>$request->option_one,
            'option_two'=>$request->option_two,
            'option_three'=>$request->option_three,
            'option_four'=>$request->option_four,
            'correct_answer'=>$request->correct_answer,'exam_id'=>$request->exam_id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $questions = Question::all();

        $is_update = false;

        return view('admin.manage_question', compact('questions', 'is_update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, $id)
    {
        $question=Question::find($id);

        $questions=Question::all();

        $is_update = true;

        $exams = Exam::all();

        return view('admin.manage_question', compact('is_update', 'questions', 'question', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, $id)
    {
        $question = Question::find($id);
        $question->question_number=$request->question_number;
        $question->question_text=$request->question_text;
        $question->question_points=$request->question_points;
        $question->option_one=$request->option_one;
        $question->option_two=$request->option_two;
        $question->option_three=$request->option_three;
        $question->option_four=$request->option_four;
        $question->correct_answer=$request->correct_answer;
        $question->exam_id=$request->exam_id;

        $question->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, $request)
    {
        $question=Question::find($request);

        $question->delete($request);

        return redirect()->back();
    }
}
