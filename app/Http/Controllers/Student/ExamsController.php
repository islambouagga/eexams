<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\MRChoice;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:student');
    }


    public function index()
    {

        $student=auth()->user();
        date_default_timezone_set('CET');
        $timezone = date_default_timezone_get();
        $date = date('Y-m-d H:i:s');
//        $endTime = $date->addMinutes(30);
        echo "The current server timezone is: " . $timezone;
        dd($date) ;


        return view('student.exams.index')->with('groups',$student->groups)
            ->with('date',$date);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_Exam = Input::get('id');
        $e = Exam::find($id_Exam);
        return view('student.exams.create')->with('exam',$e);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $mark=0;
        $student=auth()->user();
        $id_exam=$request->id_Exam;
        $exam=Exam::find($id_exam);

        $current_date_time = Carbon::now()->toDateTimeString();
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
            if ($Q->questiontable_type == "MRQuestion") {

                $a=request('answer'.$Q->id_Question);
              $z=  collect([ $a]);
                  $z->implode('.');
                $z = str_replace('[', '', $z);
                $z = str_replace('"', '', $z);
                $z = str_replace(']', '', $z);
//                dd($z);
                $student->questions()->attach($Q, ['answer' => $z]);

                foreach ($student->questions->where('id_Question',$Q->id_Question) as $f){
//                    dd($f->pivot);
                    $g=$f->pivot->answer;
                    $g = str_replace('[', '', $g);
                    $g = str_replace('"', '', $g);
                    $g = str_replace(']', '', $g);
                    $split= explode(',',$g);
//                    dd($split);
                    $i=0;
                    $co=0;
//dd($split);
                    while ($i<count($split)){
                        $op=MRChoice::where('choice',$split[$i])->firstOrFail();
//                        dd($op->is_correct);
                        if ($op->is_correct==1){
//dd("dfg");
                            $co++;


                        }else{
                            break;
                        }
                        $i++;
                    }
                    if ($co==count($split)){
                        $mark=$mark+$Q->pivot->score;

                    }

                }

            }else{
//
            $student->questions()->attach($Q, ['answer' => request('answer'.$Q->id_Question)]);
            $AQ=$Q->questiontable;

            if ($AQ->correct_answer == request('answer'.$Q->id_Question) ){
                $mark=$mark+$Q->pivot->score;
            }
//
            }
        }
        $student->exams()->attach($exam,['date_passing' =>$current_date_time ,'mark'=>$mark]);
        return redirect('student/exams/result?id='.$id_exam );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
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
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
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
    public function result(){
        $student=auth()->user();
//        dd($student);
        $id_Exam = Input::get('id');
        $exam=Exam::find($id_Exam);
//        dd($exam);
        foreach ($exam->students()->get() as $e){
//            dd($e);

            if ($e->id_student==$student->id_student){

                $mark=$e->pivot->mark;
//                dd($mark);
                return view('student.exams.result')->with('mark',$mark);
            }

        }

    }
}
