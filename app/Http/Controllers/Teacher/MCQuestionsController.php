<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\MCQuestion;
use App\Question;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use App\Choice;

class MCQuestionsController extends Controller
{
    public $id_exam = 1;
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
        $id_Exam = Input::get('id');
//        echo $id_Exam;
        $test=Input::get('key');
//        echo $test;
//        echo $_GET['key']
        return view('teacher.questions.mcquestions.create', compact('id_Exam','test'));
    }

    public function addMorePost(Request $request)

    {

        $rules = [];


        foreach($request->input('choice') as $key => $value) {

            $rules["choice.{$key}"] = 'required';

        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('choice') as $key => $value) {

                choice::create(['choice'=>$value]);

            }


            return response()->json(['success'=>'done']);

        }


        return response()->json(['error'=>$validator->errors()->all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,MCQuestion $MCQuestion,Question $question, ExamsController $examsController)
    {
        $this->id_exam = $examsController->iid_Exam;

        $exam = Exam::Find($this->id_exam);


        $question->expression = $request->expression;
        $MCQuestion->correct_answer = $request->correct_answer;
        $MCQuestion->save();
        $time=  $request->estimated_time;
        $time= str_replace('H','',$time);
        $time=str_replace('M','',$time);
        $time=$time.':00';
        $format=    DateTime::createFromFormat('H:i:s',$time);
//dd($format->getTimestamp());

        $question->estimated_time = $format;
        $question->questiontable_id = $MCQuestion->id_m_c_questions;
        $question->questiontable_type = "MCQuestion";
        $exam_current = $request->id_Exam;


        $choices = [];
        foreach ($request->choice as $ch) {
            $choix= new Choice();
            $choix->choice=$ch;
            $choices[] = $choix;
        }

        $MCQuestion->choices()->saveMany($choices);

//        $MCQuestion->choices()->saveMany($choice);
        $question->save();
        Exam::find($exam_current)->questions()->attach($question, ['order' => $request->order, 'score' => $request->score]);
        switch ($request->submitbtn) {
            case'submit';
                return redirect('teacher/exams?id=' . $exam_current);
                break;
            case 'add';
                return redirect('teacher/questions/mcquestions/create?id=' . $exam_current);
                break;
            case 'mit2';
                return redirect('/teacher/exams/'.$exam_current.'/edit');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MCQuestion  $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(MCQuestion $mCQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MCQuestion  $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(MCQuestion $mCQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MCQuestion  $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MCQuestion $mCQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MCQuestion  $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MCQuestion $mCQuestion)
    {
        //
    }
}
