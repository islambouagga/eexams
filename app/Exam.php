<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $primaryKey = 'id_Exam';

    public function questions(){
        return $this->belongsToMany('App\Question','exam_questions','id_Exam','id_Question')
            ->withPivot([
                    'order','score'
                ]
            )
            ;
    }
}
