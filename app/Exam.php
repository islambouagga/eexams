<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $primaryKey = 'id_Exam';

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'exam_questions',
            'id_Exam', 'id_Question')
            ->withPivot([
                    'order', 'score'
                ]
            );
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'student_exams',
            'id_Exam', 'id_student')
            ->withPivot(['date_passing', 'mark']);
    }

    public function groupes()
    {
        return $this->belongsToMany('App\Group',
            'exam_groups', 'id_Exam', 'id_Group')
            ->withPivot(['date_scheduling', 'Time_limit']);
    }
}
