<?php

namespace App\Http\Controllers\Teacher;


use App\Teacher;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Question;
use App\TFQuestion;
use Illuminate\Support\Facades\Input;

class ExamsController extends Controller
{
    public $iid_Exam;
    public $ide;
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
      $teacher=auth()->user();


        return view('teacher.exams.index')->with('exams',$teacher->exams);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Exam $exam)
    {

        $exam->title = $request->title ;
        $exam->Description = $request->Description;
        $exam->id_teacher=auth()->user()->getAuthIdentifier();
        $exam->save();

        $this->iid_Exam=$exam->id_Exam;

        return redirect('teacher/questions/tfquestions/create?id='.$this->iid_Exam.'&key=0');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {

        return view('teacher.exams.show')->with('exams',$exam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {



        return view('teacher.exams.edit')->with('exams',$exam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Exam $exam,TFQuestion $TFQuestion,Question $question)
    {

        $exam_current = $request->id_Exam;
        $e = Exam::find($exam_current);
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
            $question = Question::find($Q->id_Question);
            $TFQuestion = TFQuestion::find($Q->id_Question);
            $question->expression = request('expression'.$Q->id_Question);
            $TFQuestion->correct_answer = request('correct_answer'.$Q->id_Question);
            $TFQuestion->save();
            $time=  request('estimated_time'.$Q->id_Question);
            $time= str_replace('H','',$time);
            $time=str_replace('M','',$time);
            $time=$time.':00';
            $format=    DateTime::createFromFormat('H:i:s',$time);

            $question->estimated_time =$format ;
            $question->questiontable_id = $TFQuestion->id_t_f_questions;
            $question->questiontable_type = "TFQuestion";
            $question->save();

            $e->questions()->updateExistingPivot($question->id_Question, ['score' => request('score'.$Q->id_Question),'order' => request('order'.$Q->id_Question)]);




        }
        return view('teacher.exams.show')->with('exams',$e);




 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
//        dd('hh');
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
//            echo $Q->id_Question;
        $exam->questions()->detach([$Q->id_Question]);
    }
        $exam->delete();
        return redirect('/teacher/exams');
    }
}
