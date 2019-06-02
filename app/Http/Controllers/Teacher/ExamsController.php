<?php

namespace App\Http\Controllers\Teacher;


use App\MCChoice;
use App\MCQuestion;
use App\MRChoice;
use App\MRQuestion;
use App\Teacher;
use DateTime;
use foo\bar;
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
    public $mrq = null;
    public $mcq = null;
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
        $teacher = auth()->user();

        return view('teacher.exams.index')->with('exams', $teacher->exams);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exam $exam)
    {
        $exam->title = $request->title;
        $exam->Description = $request->Description;
        $exam->id_teacher = auth()->user()->getAuthIdentifier();
        $exam->save();
        $this->iid_Exam = $exam->id_Exam;
        return redirect('teacher/questions/mcquestions/create?id=' . $this->iid_Exam . '&key=0');
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('teacher.exams.show')->with('exams', $exam);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('teacher.exams.edit')->with('exams', $exam);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam, TFQuestion $TFQuestion, MCQuestion $MCQuestion, MRQuestion $MRQuestion, Question $question)
    {
//dd($request->all());
        $exam_current = $request->id_Exam;
        $e = Exam::find($exam_current);
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {
            $question = Question::find($Q->id_Question);
            if ($question->questiontable_type == "TFQuestion") {
                $TFQuestion = TFQuestion::find($Q->questiontable_id);
                $question->expression = request('expression' . $Q->id_Question);
                $TFQuestion->correct_answer = request('correct_answer' . $Q->id_Question);
                $TFQuestion->save();
                $time = request('estimated_time' . $Q->id_Question);
                $time = str_replace('H', '', $time);
                $time = str_replace('M', '', $time);
                $time = $time . ':00';
                $format = DateTime::createFromFormat('H:i:s', $time);
                $question->estimated_time = $format;
                $question->questiontable_id = $TFQuestion->id_t_f_questions;
                $question->questiontable_type = "TFQuestion";
                $question->save();
                $e->questions()->updateExistingPivot($question->id_Question, ['score' => request('score' . $Q->id_Question), 'order' => request('order' . $Q->id_Question)]);
            }
            if ($question->questiontable_type == "MCQuestion") {
                $MCQuestion = MCQuestion::find($Q->questiontable_id);
                $question->expression = request('expression' . $Q->id_Question);
                $MCQuestion->correct_answer = request('correct_answer' . $Q->id_Question);
                $MCQuestion->save();
                $time = request('estimated_time' . $Q->id_Question);
                $time = str_replace('H', '', $time);
                $time = str_replace('M', '', $time);
                $time = $time . ':00';
                $format = DateTime::createFromFormat('H:i:s', $time);
                $question->estimated_time = $format;
                $question->questiontable_id = $MCQuestion->id_m_c_questions;
                $question->questiontable_type = "MCQuestion";
                $question->save();
                $MCQuestion->choices()->delete();
                $choices = [];
                foreach (request('choice' . $Q->id_Question) as $ch) {
                    $choix = new MCChoice();
                    $choix->choice = $ch;
                    $choices[] = $choix;
                }
                $MCQuestion->choices()->saveMany($choices);
                $e->questions()->updateExistingPivot($question->id_Question, ['score' => request('score' . $Q->id_Question), 'order' => request('order' . $Q->id_Question)]);
            }
            if ($question->questiontable_type == "MRQuestion") {
                $MRQuestion = MRQuestion::find($Q->questiontable_id);
                $question->expression = request('expression' . $Q->id_Question);
                $MRQuestion->save();
                $time = request('estimated_time' . $Q->id_Question);
                $time = str_replace('H', '', $time);
                $time = str_replace('M', '', $time);
                $time = $time . ':00';
                $format = DateTime::createFromFormat('H:i:s', $time);
                $question->estimated_time = $format;
                $question->questiontable_id = $MRQuestion->id_m_r_questions;
                $question->questiontable_type = "MRQuestion";
                $question->save();
                $MRQuestion->choices()->delete();
                $choices = [];
                $coc = 0;
                $coidc = 0;
                while ($coidc < count(request('is_correct' . $Q->id_Question))) {
                    $choix = new MRChoice();
                    $ch = request('choice' . $Q->id_Question)[$coc];
                    $isc = request('is_correct' . $Q->id_Question)[$coidc];
                    $choix->choice = $ch;
                    $choix->is_correct = $isc;
                    $choices[] = $choix;
                    if ($isc == 1) {
                        $coidc++;
                    }
                    $coc++;
                    $coidc++;
                }
                $MRQuestion->choices()->saveMany($choices);
                $e->questions()->updateExistingPivot($question->id_Question, ['score' => request('score' . $Q->id_Question), 'order' => request('order' . $Q->id_Question)]);
            }
        }
        return view('teacher.exams.show')->with('exams', $e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        foreach ($exam->questions()->orderBy('order')->get() as $Q) {

            $exam->questions()->detach([$Q->id_Question]);
        }
        $exam->delete();
        return redirect('/teacher/exams');
    }
}
