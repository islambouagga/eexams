<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth()->user();
        return view('teacher.questions.index')->with('exams', $teacher->questions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question=Question::find($request->id_Question);
        $exam=Exam::find($request->id_Exam);
        $exam->questions()->detach([$question->id_Question]);
        $qcount = count($exam->questions);
        $tfq = 0;
        $mcq = 0;
        $mrq = 0;
        $saq = 0;
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
            if ($q->questiontable_type == "SAQuestion") {
                $saq++;
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
            ->with('tst', $c)->with('pst', $m)->with('saq', $saq)
            ->with('stn', $r - 1)->with('dsch', $d);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

    }
}
