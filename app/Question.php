<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'TFQuestion'=>'App\TFQuestion'
]);
Relation::morphMap([
    'MCQuestion'=>'App\MCQuestion'
]);
Relation::morphMap([
    'MRQuestion'=>'App\MRQuestion'
]);

class Question extends Model
{
    protected $primaryKey = 'id_Question';
    public function exams(){
        return $this->belongsToMany('App\Exam','exam_questions','id_Exam','id_Question')
            ->withPivot([
                'order','score'
            ])

            ;
    }
    public function students(){
    return $this->belongsToMany('App\Student','student_questions','id_student','id_Question')->withPivot(['answer']);

    }

    public function  questiontable(){

        return $this->morphTo();
    }
}
