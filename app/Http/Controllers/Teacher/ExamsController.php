<?php

namespace App\Http\Controllers\Teacher;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Question;
use App\TFQuestion;

class ExamsController extends Controller
{
    public $iid_Exam;
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

        $exams = Exam::all();

        return view('teacher.exams.index')->with('exams',$exams);


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
//        $exam->id_Exam='100';
        $exam->title = $request->title ;
        $exam->Description = $request->Description;
        $exam->Time_limited= $request->Time_limited;
        $exam->save();
//        return $exam->id_Exam;
        $this->iid_Exam=$exam->id_Exam;

        return redirect('teacher/questions/tfquestions/create?id='.$this->iid_Exam);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
//        foreach ($exams->questions()->orderBy('order')->get() as $Q) {
//            echo $Q->id;
//        }
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
//        $exams = Exam::find($id);
//        $arr['exams']= Exam::find($id);
//        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
//            echo $Q->expression;
//        }
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
      $nb = $exam->questions()->count();
//      echo $nb;
//      dd($nb);
//     for ($i=1 ;$i<= $nb ; $i++) {
//          echo $i;
//        dd($request->get()) ;
//        }
//        for ($i=1 ;$i<= $nb ; $i++){

        dd($request->allFiles());
//$aar->split();

//        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
////
//
//            $question=Question::find($Q->id_Question);
//            $question->expression= request('expression'.$Q->id_Question);
////            $question->expression=$request->expression;
//            $question->save();
//            return $question;
//            dd(request('expression'.$Q->id_Question));
//        }
//            return $i;
//        }
//        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
//            return $Q->id_Question;
//        }
//        $courrntQ=request->id_Question;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
