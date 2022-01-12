<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Answer;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user_result = 0;

        $total_score = 0;

        $is_pass = 0;

        $exam = Exam::find($id);

        foreach ($request->except('_token') as $input_question_id => $user_answer) {
            Result::create([
                'user_result'=>$user_result,
                'user_id'=>3,
                'exam_id'=>$id
            ]);

            $questions = Question::all();

            foreach ($questions as $question) {

                if ($input_question_id === $question->id) {

                    $total_score += $question->question_points;

                    if ($user_answer === $question->correct_answer) {

                        $user_result += $question->question_points;

                    }

                }

                Answer::create([
                    'user_answer'=>$user_answer,
                    'question_id'=>$input_question_id,
                    'user_id'=>3,
                    'exam_id'=>$id
                ]);

            }

            $user_answers = Answer::where('exam_id',$id)->get();

            if ($user_result > $total_score / 2) {

                $is_pass = 1;

            }
        }

        return view('public.result', compact('user_result', 'total_score', 'exam', 'is_pass', 'user_answers','questions'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
