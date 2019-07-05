<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\MRChoice;
use App\MRQuestion;
use App\Question;
use App\SAQuestion;
use App\Student;
use Carbon\Carbon;
use DateTime;
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


$sd=0;
        $student = auth()->user();
        $s=Student::find(4);
//        dd(count($s->exams));
        $gr=0;
        $exams=[];
        $exas=[];
        $exam=0;
        foreach ($student->groups as $g){
            foreach ($g->exams as $e){
                $gr++;
                $exams[]=$e;
                $tl = $g->pivot->date_scheduling;
            }
        }
//        dd($exams);
        foreach ($student->groups as $g){
            foreach ($g->exams as $e){
                foreach ($e->students->where('id_student',$student->id_student) as $ss){
                    $id=$e->id_Exam;
                    $exam=$e;
                    $key= array_search($exam, $exams);
                    unset($exams[$key]);

                }
                if ($exam ==null){
                    $sd++;
                }else{

                    break;
                }


        }
        }

        foreach($student->exams as $eee){
            $exas[]=$eee;

    }



//        dd($exams);
        date_default_timezone_set('CET');
        $timezone = date_default_timezone_get();

        $date= new Carbon('now', 'CET');

        $dt = Carbon::create($tl);
        $drt = $dt->addMinutes(30);
        return view('student.exams.index')->with('exams', $exams)
            ->with('date', $date)->with('da',$drt)->with('student',$student)
            ->with('gr',$gr);

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
        foreach ($e->groupes as $g) {
            $tl = $g->pivot->date_scheduling;
        }
//        dd($tl);
        $drt = Carbon::create($tl);
//$dt=$drt->addHours(1);
        $dt = $drt->addMinutes(30);
//dd($drt->addHours(24));
        $numbers = range(1, count($e->questions));
        shuffle($numbers);
        $order = [];
        foreach ($numbers as $number) {
            $order[] = $number;
        }

        return view('student.exams.create')->with('exam', $e)->with('order', $order)
            ->with('tl', $dt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark = 0;
        $m = 0;
        $co = 0;
        $student = auth()->user();
        $id_exam = $request->id_Exam;
        $exam = Exam::find($id_exam);
        $current_date_time = Carbon::now()->toDateTimeString();
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
            if ($Q->questiontable_type == "MRQuestion") {
                if ($request->answer == null) {
                    $mark = $mark + 0;
                } else {
                    $mrq = MRQuestion::find($Q->questiontable_id);
                    $count = 0;
                    foreach ($mrq->choices->where('is_correct', 1) as $choice) {
                        $count++;
                    }
                    $a = request('answer' . $Q->id_Question);
                    $z = collect([$a]);
                    $z->implode('.');
                    $z = str_replace('[', '', $z);
                    $z = str_replace('"', '', $z);
                    $z = str_replace(']', '', $z);
                    $student->questions()->attach($Q, ['answer' => $z]);
                    foreach ($student->questions->where('id_Question', $Q->id_Question) as $f) {
                        $g = $f->pivot->answer;
                        $g = str_replace('[', '', $g);
                        $g = str_replace('"', '', $g);
                        $g = str_replace(']', '', $g);
                        $split = explode(',', $g);
                        $i = 0;
                        while ($i < count($split)) {
                            $op = MRChoice::where('id_m_r_choices', $split[$i])->firstOrFail();
                            if ($op->is_correct == 1) {
                                $co++;
                            } else {
                                break;
                            }
                            $i++;
                        }
                        if ($co == $count) {
                            $mark = $mark + $Q->pivot->score;
                        }

                    }

                }
            }
            if ($Q->questiontable_type == "SAQuestion") {
                if ($request->answer == null) {
                    $mark = $mark + 0;
                } else {
                    $student->questions()->attach($Q, ['answer' => request('answer' . $Q->id_Question)]);
                    $saq = SAQuestion::find($Q->questiontable_id);
                    foreach ($saq->choices as $choice) {
                        $lentghco = strlen($choice->choice);
                        $cost = levenshtein($choice->choice, request('answer' . $Q->id_Question), 1, 1, 1);
                        if ((($cost * 100) / $lentghco) <= $m) {
                            $mark = $mark + $Q->pivot->score;
                            break;
                        }
                    }
                }
            }
            if ($Q->questiontable_type == "TFQuestion" or $Q->questiontable_type == "MCQuestion") {
                if ($request->answer == null) {
                    $mark = $mark + 0;
                } else {
                    $student->questions()->attach($Q, ['answer' => request('answer' . $Q->id_Question)]);
                    $AQ = $Q->questiontable;
                    if ($AQ->correct_answer == request('answer' . $Q->id_Question)) {
                        $mark = $mark + $Q->pivot->score;
                    }
                }
            }
            $student->exams()->attach($exam, ['date_passing' => $current_date_time, 'mark' => $mark]);
            return redirect('student/exams/result?id=' . $id_exam . '$key=' . $m)->with('m', $m);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
//        dd($request->all());
        $mark = 0;
        $m = 0;
        $co = 0;
        $student = auth()->user();
        $id_exam = $request->id_Exam;
        $exam = Exam::find($id_exam);
        $current_time = Carbon::now()->toDateTimeString();

        foreach ($exam->questions()->orderBy('order')->get() as $Q) {

            if ($Q->questiontable_type == "MRQuestion") {


                    $mrq = MRQuestion::find($Q->questiontable_id);
                    $count = 0;
                    foreach ($mrq->choices->where('is_correct', 1) as $choice) {
                        $count++;
                    }
                    $a = request('answer' . $Q->id_Question);
                    $z = collect([$a]);
                    $z->implode('.');
                    $z = str_replace('[', '', $z);
                    $z = str_replace('"', '', $z);
                    $z = str_replace(']', '', $z);
                    $student->questions()->attach($Q, ['answer' => $z]);
                    foreach ($student->questions->where('id_Question', $Q->id_Question) as $f) {
                        $g = $f->pivot->answer;
                        $g = str_replace('[', '', $g);
                        $g = str_replace('"', '', $g);
                        $g = str_replace(']', '', $g);
                        $split = explode(',', $g);
                        $i = 0;
                        while ($i < count($split)) {
                            $op = MRChoice::where('id_m_r_choices', $split[$i])->firstOrFail();
                            if ($op->is_correct == 1) {
                                $co++;
                            } else {
                                break;
                            }
                            $i++;
                        }
                        if ($co == $count) {
                            $mark = $mark + $Q->pivot->score;
                        }
//                        dd($mark);

                    }

                }

            if ($Q->questiontable_type == "SAQuestion") {

                    $student->questions()->attach($Q, ['answer' => request('answer' . $Q->id_Question)]);
                    $saq = SAQuestion::find($Q->questiontable_id);
                    foreach ($saq->choices as $choice) {
                        $lentghco = strlen($choice->choice);
                        $cost = levenshtein($choice->choice, request('answer' . $Q->id_Question), 1, 1, 1);
                        if ((($cost * 100) / $lentghco) <= $m) {
                            $mark = $mark + $Q->pivot->score;
                            break;
                        }
                    }
                }

            if ($Q->questiontable_type == "TFQuestion" or $Q->questiontable_type == "MCQuestion") {


                    $student->questions()->attach($Q, ['answer' => request('answer' . $Q->id_Question)]);
                    $AQ = $Q->questiontable;
                    if ($AQ->correct_answer == request('answer' . $Q->id_Question)) {
                        $mark = $mark + $Q->pivot->score;

                    }
                }
            }
//        dd($mark);
            $student->exams()->updateExistingPivot($exam, ['date_passing' => $current_time, 'mark' => $mark]);
            return redirect('student/exams/result?id=' . $id_exam . '$key=' . $m)->with('m', $m);


        }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Exam $exam)
    {

    }

    public function result()
    {
//        $st='ho';
//        if (strpos("holla",$st)!== false){
//            dd('ko');
//        }
        $student = auth()->user();

        $id_Exam = Input::get('id');
        $m = Input::get('key');
        $exam = Exam::find($id_Exam);
        $numbers = range(1, count($exam->questions));
        shuffle($numbers);
        $order = [];
        foreach ($numbers as $number) {
            $order[] = $number;
        }
        $q = Question::find(71);

        foreach ($exam->students()->get() as $e) {


            if ($e->id_student == $student->id_student) {

                $mark = $e->pivot->mark;

                return view('student.exams.result')->with('mark', $mark)->with('exam', $exam)
                    ->with('order', $order)->with('id_student', $student->id_student)->with('m', $m);
            }

        }

    }
    public function pass(Request $request){
//        dd($request->all());
//        dd("dd");
        $mark=0;
        $date_passing= "00:00:00";
        $format = DateTime::createFromFormat('H:i:s', $date_passing);
//        dd($format);
        $current_date_time = Carbon::now()->toDateTimeString();
        $student = auth()->user();
        $exam= Exam::find($request->id);
//        dd($exam);
        $student->exams()->attach($exam, ['date_taking' => $current_date_time, 'mark' => $mark,'date_passing'=> null]);
        return redirect('student/exams/create? id='.$exam->id_Exam)->with('exam',$exam);

    }
}
