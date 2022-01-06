<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();

        return view('admin.manage_exam', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_exam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'exam_name'=>'reqiured|max:250',
        //     'exam_number_of_questions'=>'reqiured',
        //     'exam_image'=>'mimes:png,jpg,jpeg,jfif,gif'

        // ]);
        if ($request->hasFile('exam_image')) {
            $file = $request->exam_image;
            $new_file = time().$file->getClientOriginalName();
            $file->move('storage/images', $new_file);

        }
        Exam::create([

            'exam_name'=>$request->exam_name,
            'exam_number_of_questions'=>$request->exam_number_of_questions,
            'exam_image'=>$new_file

        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $exam=Exam::find($request);
        $exam->delete();
        return redirect()->back();
    }
}
