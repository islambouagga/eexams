<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'id_Group';

    public function students()
    {
        return $this->belongsToMany('App\Student', 'student_groups',
            'id_Group', 'id_student');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam',
            'exam_groups', 'id_Group', 'id_Exam')
            ->withPivot(['date_scheduling', 'Time_limit']);

    }
}
