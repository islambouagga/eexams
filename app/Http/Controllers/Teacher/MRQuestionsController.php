<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\MCChoice;
use App\MRChoice;
use App\MRQuestion;
use App\Question;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class MRQuestionsController extends Controller
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
        return view('teacher.questions.mrquestions.create', compact('id_Exam','test'));
    }

    public function addMorePost(Request $request)

    {

        $rules = [];
        $rule= [];

        foreach($request->input('choice') as $key => $value  ) {

            $rules["choice.{$key}"] = 'required';

        }
        foreach($request->input('is_correct') as $ke => $valu  ) {

            $rule["is_correct.{$ke}"] = 'required';

        }


        $validator = Validator::make($request->all(), $rules);
        $validato = Validator::make($request->all(), $rule);


        if ($validator->passes()) {


            foreach($request->input('choice') as $key => $value) {

                MRChoice::create(['choice'=>$value]);

            }


            return response()->json(['success'=>'done']);

        }
        if ($validato->passes()) {


            foreach($request->input('is_correct') as $ke => $valu) {

                MRChoice::create(['is_correct'=>$valu]);

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
    public function store(Request $request,MRQuestion $MRQuestion,Question $question, ExamsController $examsController)
    {


        $this->id_exam = $examsController->iid_Exam;

        $exam = Exam::Find($this->id_exam);


        $question->expression = $request->expression;

        $MRQuestion->save();
        $time=  $request->estimated_time;
        $time= str_replace('H','',$time);
        $time=str_replace('M','',$time);
        $time=$time.':00';
        $format=    DateTime::createFromFormat('H:i:s',$time);


        $question->estimated_time = $format;
        $question->questiontable_id = $MRQuestion->id_m_r_questions;
        $question->questiontable_type = "MRQuestion";
        $exam_current = $request->id_Exam;


        $choices = [];
        $coc=0;
        $coidc=0;
        while($coidc<count($request->is_correct)) {
            $choix= new MRChoice();
            $ch=$request->choice[$coc];
            $isc=$request->is_correct[$coidc];
            $choix->choice=$ch;
            $choix->is_correct=$isc;
            $choices[] = $choix;
            if($isc==1){
                $coidc++;
            }
            $coc++;
            $coidc++;
        }

        $MRQuestion->choices()->saveMany($choices);

        $question->save();

        Exam::find($exam_current)->questions()->attach($question, ['order' => $request->order, 'score' => $request->score]);
        switch ($request->submitbtn) {
            case'submit';
                return redirect('teacher/exams?id=' . $exam_current);
                break;
            case 'add';
                return redirect('teacher/questions/mrquestions/create?id=' . $exam_current);
                break;
            case 'mit2';
                return redirect('/teacher/exams/'.$exam_current.'/edit');
                break;
        }
    }

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
