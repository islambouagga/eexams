<?php

namespace App\Http\Controllers\Teacher;


use App\Group;
use App\MCChoice;
use App\MCQuestion;
use App\MRChoice;
use App\MRQuestion;
use App\Teacher;
use Carbon\Carbon;
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
        $m = 0;
        $r = 0;
        $s = null;
        $c = 0;
        $epassed = 0;
        $eschu = 0;
        $teacher = auth()->user();
        $ecout = count($teacher->exams);
        foreach ($teacher->exams as $e) {

            if (count($e->students) != 0) {
//        $c=count($e->students);
                $epassed++;
                foreach ($e->students as $st) {
                    if ($st->pivot->mark >= 10) {
                        $m++;
                    }
                    if ($st->id_student != null and $st->id_student != $r) {
                        $c++;

                        $r = $st->id_student;
                    }
                }
            }
            if (count($e->groupes) != 0) {
                $eschu++;
            }

        }
//dd($eschu-$epassed);

        return view('teacher.exams.index')->with('exams', $teacher->exams)
            ->with('ecount', $ecout)->with('epassed', $epassed)
            ->with('eschu', $eschu - $epassed)->with('pass10', $m);
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
//        dd($exam->students);
        $qcount = count($exam->questions);
        $tfq = 0;
        $mcq = 0;
        $mrq = 0;
        $r = null;
        $c = 0;
        $m = 0;
        $r = 0;
        $d = null;
        foreach ($exam->questions as $q) {
            if ($q->questiontable_type == "TFQuestion") {
                $tfq++;
            }
            if ($q->questiontable_type == "MCQuestion") {
                $mcq++;
            }
            if ($q->questiontable_type == "MRQuestion") {
                $mrq++;
            }
        }
        foreach ($exam->students as $st) {
            if ($st->id_student != $r) {
                $c++;
                $r = $st->id_student;
            }
            if ($st->pivot->mark >= 10) {
                $m++;
            }
        }
        foreach ($exam->groupes as $gr) {

            $r += count($gr->students);
            $d = $gr->pivot->date_scheduling;
        }


        return view('teacher.exams.show')->with('exams', $exam)
            ->with('tfq', $tfq)->with('mrq', $mrq)->with('mcq', $mcq)->with('qcount', $qcount)
            ->with('tst', $c)->with('pst', $m)
            ->with('stn', $r - 1)->with('dsch', $d);
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
        $e->title = $request->title;
        $e->Description = $request->Description;

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
        $e->save();
        $qcount = count($e->questions);
        $tfq = 0;
        $mcq = 0;
        $mrq = 0;
        $r = null;
        $c = 0;
        $m = 0;
        $r = 0;
        $d = null;
        foreach ($e->questions as $q) {
            if ($q->questiontable_type == "TFQuestion") {
                $tfq++;
            }
            if ($q->questiontable_type == "MCQuestion") {
                $mcq++;
            }
            if ($q->questiontable_type == "MRQuestion") {
                $mrq++;
            }
        }
        foreach ($e->students as $st) {
            if ($st->id_student != $r) {
                $c++;
                $r = $st->id_student;
            }
            if ($st->pivot->mark >= 10) {
                $m++;
            }
        }
        foreach ($e->groupes as $gr) {

            $r += count($gr->students);
            $d = $gr->pivot->date_scheduling;
        }
        return view('teacher.exams.show')->with('exams', $e)->with('tfq', $tfq)->with('mrq', $mrq)->with('mcq', $mcq)->with('qcount', $qcount)
            ->with('tst', $c)->with('pst', $m)
            ->with('stn', $r - 1)->with('dsch', $d);
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

    public function schedule(Exam $exam)
    {
        $groups = Group::all();
        return view('teacher.exams.schedule')->with('groups', $groups)->with('exam', $exam);
    }

    public function doschedule(Request $request, Exam $exam)
    {
//        dd($request->all());
        $group = Group::find($request->group);
        $exam = Exam::find($request->id_Exam);
        $text = $request->date_scheduling;
//        dd($text);
        $split = explode('-', $text, 2);
        $startdate = $split[0];
        $enddate = $split[1];
        $startTime = Carbon::parse($startdate);
//        dd($startTime);
        $finishTime = Carbon::parse($enddate);
        $hours = $finishTime->diff($startTime);
        $minutes = $finishTime->diffInMinutes($startTime);
        $seconds = $finishTime->diffInSeconds($startTime);
//        dd($group);
        $group->exams()->attach($exam, ['date_scheduling' => $startTime, 'Time_limit' => $hours->format('%H:%I')]);
        $teacher = auth()->user();
        $m = 0;
        $r = 0;
        $s = null;
        $c = 0;
        $epassed = 0;
        $eschu = 0;
        $teacher = auth()->user();
        $ecout = count($teacher->exams);
        foreach ($teacher->exams as $e) {

            if (count($e->students) != 0) {
//        $c=count($e->students);
                $epassed++;
                foreach ($e->students as $st) {
                    if ($st->pivot->mark >= 10) {
                        $m++;
                    }
                    if ($st->id_student != null and $st->id_student != $r) {
                        $c++;

                        $r = $st->id_student;
                    }
                }
            }
            if (count($e->groupes) != 0) {
                $eschu++;
            }

        }
        return view('teacher.exams.index')->with('exams', $teacher->exams)->with('ecount', $ecout)->with('epassed', $epassed)
            ->with('eschu', $eschu - $epassed)->with('pass10', $m);
    }
}