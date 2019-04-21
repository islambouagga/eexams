<?php

namespace App\Http\Controllers\Student;

use App\Exam;
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
        $exams = Exam::all();

        return view('student.exams.index')->with('exams',$exams);

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
        $mark=0;
        $student=auth()->user();
        $id_exam=$request->id_Exam;
        $exam=Exam::find($id_exam);
        $current_date_time = Carbon::now()->toDateTimeString();
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {

            $student->questions()->attach($Q, ['answer' => request('answer'.$Q->id_Question)]);
            $AQ=$Q->questiontable;

            if ($AQ->correct_answer == request('answer'.$Q->id_Question) ){
                $mark=$mark+$Q->pivot->score;
            }

        }
        $student->exams()->attach($exam,['date_passing' =>$current_date_time ,'mark'=>$mark]);
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
}
