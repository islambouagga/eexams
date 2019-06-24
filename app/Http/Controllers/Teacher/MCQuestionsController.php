<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\MCChoice;
use App\MCQuestion;
use App\Question;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;


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
 $sum=0;
        $id_Exam = Input::get('id');
        $test = Input::get('key');
        $exam=Exam::find($id_Exam);
        $ecount=count($exam->questions) ;
        foreach($exam->questions  as $e){
            $sum=$sum+$e->pivot->score;
        }


        return view('teacher.questions.mcquestions.create', compact('id_Exam', 'test'))
            ->with('sumS',$sum)
            ->with('ecount',$ecount);
    }

    public function addMorePost(Request $request)
    {
        $rules = [];
        foreach ($request->input('choice') as $key => $value) {
            $rules["choice.{$key}"] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            foreach ($request->input('choice') as $key => $value) {
                MCChoice::create(['choice' => $value]);
            }
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MCQuestion $MCQuestion, Question $question, ExamsController $examsController)
    {
        $exam_current = $request->id_Exam;

        if ($request->submitbtn!='add3'){
            $validated = request()->validate([
                'expression' =>['required','min:3'],
                'score' =>['required','min:1','max:20']
            ]);
        }

        $sum=0;
        $teacher = auth()->user();


        if($request->expression!=null and $request->score!=null and $request->order!=null and $request->correct_answer!=null ){
        $this->id_exam = $examsController->iid_Exam;
        $exam = Exam::Find($this->id_exam);
        $question->expression = $request->expression;
        $MCQuestion->correct_answer = $request->correct_answer;
        $MCQuestion->save();
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
        $question->questiontable_id = $MCQuestion->id_m_c_questions;
        $question->questiontable_type = "MCQuestion";
        $exam_current = $request->id_Exam;

        $choices = [];
        foreach ($request->choice as $ch) {
            $choix = new MCChoice();
            $choix->choice = $ch;
            $choices[] = $choix;
        }
        $MCQuestion->choices()->saveMany($choices);
            $question->id_teacher = auth()->user()->getAuthIdentifier();
        $question->save();
        Exam::find($exam_current)->questions()->attach($question, ['order' => $request->order, 'score' => $request->score]);


            $exam=Exam::find($exam_current);
            foreach($exam->questions  as $e){
                $sum=$sum+$e->pivot->score;
            }

        }

        switch ($request->submitbtn) {
            case'submit';
            if ($sum>20){
                Exam::find($exam_current)->questions()->detach($question);
                $sm=$sum-$request->score;
                return redirect('teacher/questions/mcquestions/'.$question->id_Question.'/edit?id='.$question->id_Question.'&key='.$exam_current.'&sm='.$sm.'&note='.$request->score)
                    ->with('sm',$sm)->with('note',$request->score);
            }
                return redirect('teacher/exams?id=' . $exam_current);
                break;
            case 'add';
                if ($sum>20){
                    Exam::find($exam_current)->questions()->detach($question);
                    $sm=$sum-$request->score;
                    return redirect('teacher/questions/mcquestions/'.$question->id_Question.'/edit?id='.$question->id_Question.'&key='.$exam_current.'&sm='.$sm.'&note='.$request->score)
                        ->with('sm',$sm)->with('note',$request->score);
                }
                return redirect('teacher/questions/mcquestions/create?id=' . $exam_current);
                break;
            case 'mit2';
                if ($sum>20){
                    Exam::find($exam_current)->questions()->detach($question);
                    $sm=$sum-$request->score;
                    return redirect('teacher/questions/mcquestions/'.$question->id_Question.'/edit?id='.$question->id_Question.'&key='.$exam_current.'&sm='.$sm.'&note='.$request->score)
                        ->with('sm',$sm)->with('note',$request->score);
                }
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
     * @param \App\MCQuestion $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(MCQuestion $mCQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\MCQuestion $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $sum=0;
        $id_question = Input::get('id');
        $id_exam = Input::get('key');
        $sm = Input::get('sm');
        $note = Input::get('note');
        $exam=Exam::find($id_exam);
        $ecount=count($exam->questions) ;
        foreach($exam->questions  as $e){
            $sum=$sum+$e->pivot->score;
        }
        $question=Question::find($id_question);
//        dd($question->id_Question);

        return view('teacher.questions.mcquestions.edit')->with('question', $question)->with('id_exam',$id_exam)
            ->with('ecount',$ecount)->with('sm',$sm)->with('sumS',$sum)->with('note',$note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\MCQuestion $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MCQuestion $mCQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MCQuestion $mCQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MCQuestion $mCQuestion)
    {
        //
    }
}
