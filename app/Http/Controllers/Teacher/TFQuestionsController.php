<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Teacher\ExamsController;
use App\Exam;
use App\Exam_Question;
use App\Question;
use App\TFQuestion;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Converter\TimeConverterInterface;

class TFQuestionsController extends Controller
{
    public $id_exam = 1;

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
        $sum=0;
        $id_Exam = Input::get('id');
        $test = Input::get('key');
        $exam=Exam::find($id_Exam);
       $ecount=count($exam->questions) ;
        foreach($exam->questions  as $e){
            $sum=$sum+$e->pivot->score;
        }


        return view('teacher.questions.tfquestions.create', compact('id_Exam', 'test'))
            ->with('ecount',$ecount)->with('sumS',$sum);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TFQuestion $TFQuestion, Question $question, ExamsController $examsController)
    {
        $exam_current = $request->id_Exam;
        if($request->expression!=null and $request->score!=null and $request->order!=null and $request->correct_answer!=null ){

            $this->id_exam = $examsController->iid_Exam;
            $exam = Exam::Find($this->id_exam);
            $question->expression = $request->expression;
            $TFQuestion->correct_answer = $request->correct_answer;
            $TFQuestion->save();
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
        $question->questiontable_id = $TFQuestion->id_t_f_questions;
        $question->questiontable_type = "TFQuestion";
        $exam_current = $request->id_Exam;
        $question->save();
        Exam::find($exam_current)->questions()->attach($question, ['order' => $request->order, 'score' => $request->score]);
        }
        switch ($request->submitbtn) {
            case'submit';
                return redirect('teacher/exams');
                break;
            case 'add';
                return redirect('teacher/questions/tfquestions/create?id=' . $exam_current);
                break;
            case 'mit2';
                return redirect('/teacher/exams/' . $exam_current . '/edit');
                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
