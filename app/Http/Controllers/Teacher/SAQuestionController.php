<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\SAChoice;
use App\SAQuestion;
use App\Question;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;


class SAQuestionController extends Controller
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
        $sum=0;
        $id_Exam = Input::get('id');
        $test = Input::get('key');
        $exam=Exam::find($id_Exam);
        $ecount=count($exam->questions) ;
        foreach($exam->questions  as $e){
            $sum=$sum+$e->pivot->score;
        }


        return view('teacher.questions.saquestions.create', compact('id_Exam', 'test'))
            ->with('sumS',$sum)
            ->with('ecount',$ecount);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,SAQuestion $SAQuestion, Question $question, ExamsController $examsController)
    {
        $teacher = auth()->user();

        $exam_current = $request->id_Exam;
        if($request->expression!=null and $request->score!=null and $request->order!=null  ){

            $this->id_exam = $examsController->iid_Exam;
            $exam = Exam::Find($this->id_exam);
            $question->expression = $request->expression;
            $SAQuestion->save();
            if ($request->estimated_time == null) {
                $question->estimated_time = "0";
            }else{
                $time = $request->estimated_time;
                $time = str_replace('H', '', $time);
                $time = str_replace('M', '', $time);
                $time = $time . ':00';
                $format = DateTime::createFromFormat('H:i:s', $time);
                $question->estimated_time = $format;
            }
            $question->questiontable_id = $SAQuestion->id_s_a_questions;
            $question->questiontable_type = "SAQuestion";
            $exam_current = $request->id_Exam;
            $choices = [];
            foreach ($request->choice as $ch) {
                $choix = new SAChoice();
                $choix->choice = $ch;
                $choices[] = $choix;
            }
            $SAQuestion->choices()->saveMany($choices);
            $question->id_teacher = auth()->user()->getAuthIdentifier();
            $question->save();
            Exam::find($exam_current)->questions()->attach($question, ['order' => $request->order, 'score' => $request->score]);
        }
        switch ($request->submitbtn) {
            case'submit';
                return redirect('teacher/exams?id=' . $exam_current);
                break;
            case 'add';
                return redirect('teacher/questions/saquestions/create?id=' . $exam_current);
                break;
            case 'mit2';
                return redirect('/teacher/exams/' . $exam_current . '/edit');
                break;
            case 'add3';
                return view ('teacher.questions.index')->with('questions',$teacher->questions)->with('id_exam',$exam_current);
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SAQuestion  $sAQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SAQuestion $sAQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SAQuestion  $sAQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(SAQuestion $sAQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SAQuestion  $sAQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SAQuestion $sAQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SAQuestion  $sAQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SAQuestion $sAQuestion)
    {
        //
    }
}
