<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Teacher\ExamsController;
use App\Exam;
use App\Exam_Question;
use App\Question;
use App\TFQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TFQuestionsController extends Controller
{
    public $id_exam=1;

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $id_Exam=Input::get('id');
        return view('teacher.questions.tfquestions.create',compact('id_Exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,TFQuestion $TFQuestion,Question $question, ExamsController $examsController)
    {

        $this->id_exam=$examsController->iid_Exam;

        $exam = Exam::Find($this->id_exam);


        $question->expression= $request->expression;
        $TFQuestion->correct_answer= $request->correct_answer;
        $TFQuestion->save();
        $question->estimated_time= $request->estimated_time;
        $question->questiontable_id= $TFQuestion->id_t_f_questions;
        $question->questiontable_type= "TFQuestion";
        $exam_current=$request->id_Exam;

        $question->save();
        Exam::find($exam_current)->questions()->attach($question,['order'=>$request->order,'score'=>$request->score]);
        switch ($request->submitbtn) {
            case'submit';

                return redirect('teacher/exams?id=' .$exam_current);
                break;
            case 'add';
                return redirect('teacher/questions/tfquestions/create?id='.$exam_current);
                break;
        }}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
