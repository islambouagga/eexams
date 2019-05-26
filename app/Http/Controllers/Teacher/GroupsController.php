<?php

namespace App\Http\Controllers\Teacher;

use App\Exam;
use App\Group;
use App\Student;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{

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
        return view('teacher.groups.index')->with('groups', $teacher->groupes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();
        return view('teacher.groups.create')->with('student', $student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $groupes, Student $student)
    {
        $groupes->title = $request->title;
        $groupes->Description = $request->Description;
        $groupes->id_teacher = auth()->user()->getAuthIdentifier();
        $groupes->save();
        $groupes->students()->attach($request->students);
        return redirect('teacher/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $students = Student::all();
        return view('teacher.students.index')->with('students', $students)
            ->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->students()->attach($request->students);
        $students = Student::all();
        return view('teacher.students.index')->with('students', $students)
            ->with('group', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    public function schedule(Group $group)
    {
        $exams = Exam::all();
        return view('teacher.groups.schedule')->with('exams', $exams)->with('group', $group);
    }

    public function doschedule(Request $request, Group $group)
    {
        $exam = Exam::find($request->exam);
        $grup = Group::find($request->id_Group);
        $text = $request->date_scheduling;
        $split = explode('-', $text, 2);
        $startdate = $split[0];
        $enddate = $split[1];
        $startTime = Carbon::parse($startdate);
        $finishTime = Carbon::parse($enddate);
        $hours = $finishTime->diff($startTime);
        $minutes = $finishTime->diffInMinutes($startTime);
        $seconds = $finishTime->diffInSeconds($startTime);
        $exam->groupes()->attach($grup, ['date_scheduling' => $startTime, 'Time_limit' => $hours->format('%H:%I')]);
        $teacher = auth()->user();
        return view('teacher.groups.index')->with('groups', $teacher->groupes);
    }
}
